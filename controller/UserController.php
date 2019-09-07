<?php
require_once('repositories/UserRepository.php');
require_once('model/User.php');
require_once('controller/Controller.php');

class UserController implements Controller
{
    //A very simple controller to map different views to the "action" parameter passed through GET.

    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    private function loginAction($error = '', $info = '')
    {
        if ($this->checkIfLogged()) {
            $this->listAction();
        } else {
            $token = $this->CSRFToken();
            include('views/login.php');
        }
    }

    private function verifyLogin($email, $pass, $csrf_token)
    {
        //TODO: Check if email address is valid

        if (!empty($_POST['token'])) {
            if (hash_equals($_SESSION['token'], $csrf_token)) {
                $login_success = false;
                $user = $this->userRepository->getUserByEmail($email);
                if ($user !== null) {
                    if (password_verify($pass, $user->getPassword())) {
                        $login_success = true;
                    }
                }
                if ($login_success) {
                    $_SESSION['email'] = $email;
                    $this->listAction();
                } else {
                    $error = 'Invalid email or password.';
                    $this->loginAction($error);
                }
            } else {
                $error = 'Invalid form.';
                $this->loginAction($error);
            }
        }

    }

    private function logoutAction()
    {
        unset($_SESSION['email']);
        $this->loginAction('', 'Logged out. See you soon.');
    }

    private function listAction($error = '', $info = '')
    {
        if ($this->checkIfLogged()) {
            $token = $this->CSRFToken();
            $users = $this->userRepository->getAllUsers();
            include('views/admin.php');
        } else {
            $this->loginAction("Access denied. Please log in first.");
        }

    }

    private function deleteAction($id, $csrf_token)
    {
        if (!empty($_POST['token'])) {
            if (hash_equals($_SESSION['token'], $csrf_token)) {
                if ($this->checkIfLogged()) {
                    if ($this->userRepository->deleteUserById($id)) {
                        $this->listAction('', 'User deleted successfuly');
                    } else {
                        $error = 'Error deleting: User not found.';
                        $this->listAction($error);
                    }
                } else {
                    $this->loginAction("Access denied. Please log in first.");
                }
            } else {
                $error = 'Invalid form.';
                $this->listAction($error);
            }
        }
    }

    private function insertAction($name, $lastname, $surname, $email, $pass, $csrf_token)
    {
        if (!empty($_POST['token'])) {
            if (hash_equals($_SESSION['token'], $csrf_token)) {
                if ($this->checkIfLogged()) {
                    if ($this->userRepository->getUserByEmail($email) == null) {
                        if (empty($name) || empty($lastname) || empty($surname) || empty($email) || empty($pass)) {
                            $this->listAction('Couldnt insert the user as some form fields were blank');
                        } else {
                            if ($this->userRepository->addUser($name, $lastname, $surname, $email, $pass)) {
                                $this->listAction('', 'User inserted');
                            } else {
                                $this->listAction('Couldnt insert the user');
                            }
                        }
                    } else {
                        $this->listAction('Email already in use');
                    }
                } else {
                    $this->loginAction("Access denied. Please log in first.");
                }
            } else {
                $error = 'Invalid form.';
                $this->listAction($error);
            }
        }
    }

    private function editAction($id, $name, $lastname, $surname, $email, $pass, $csrf_token)
    {
        if (!empty($_POST['token'])) {
            if (hash_equals($_SESSION['token'], $csrf_token)) {
                if ($this->checkIfLogged()) {
                    $old_user = $this->userRepository->getUserById($id);
                    if ($old_user === null) {
                        $this->listAction('Invalid user.');
                    } else {
                        if (empty($pass)) {
                            $hashed_pass = $old_user->getPassword();
                        } else {
                            $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
                        }
                        if ($this->userRepository->updateUser($id, $name, $lastname, $surname, $email, $hashed_pass)) {
                            $this->listAction('', 'User data was updated.');
                        } else {
                            $this->listAction('Error editing the user. ');
                        }
                    }
                } else {
                    $this->loginAction("Access denied. Please log in first.");
                }
            }
        } else {
            $error = 'Invalid form.';
            $this->listAction($error);
        }
    }

    private function checkIfLogged()
    {
        return isset($_SESSION['email']);
    }

    private function CSRFToken()
    {
        if (empty($_SESSION['token'])) {
            $_SESSION['token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['token'];
    }

    public function map()
    {
        session_start();
        $params = isset($_GET['action']) ? $_GET['action'] : '';
        if ($params === 'edit') {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $id = $_POST['id'];
                $email = $_POST['email'];
                $name = $_POST['name'];
                $lastname = $_POST['lastname'];
                $surname = $_POST['surname'];
                $pass = $_POST['pass1'];
                $pass2 = $_POST['pass2'];
                $csrf_token = $_POST['token'];
                if (!empty($pass) && $pass !== $pass2) {
                    $this->listAction('Password verification did not match. Please check and try again');
                } else {
                    $this->editAction($id, $name, $lastname, $surname, $email, $pass, $csrf_token);
                }
            } else {
                $this->listAction();
            }
        } else if ($params === 'delete') {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $id = $_POST['id'];
                $csrf_token = $_POST['token'];
                $this->deleteAction($id, $csrf_token);
            } else {
                $this->listAction();
            }
        } else if ($params === 'create') {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $email = $_POST['email'];
                $name = $_POST['name'];
                $lastname = $_POST['lastname'];
                $surname = $_POST['surname'];
                $pass = $_POST['pass1'];
                $pass2 = $_POST['pass2'];
                $csrf_token = $_POST['token'];
                if ($pass == $pass2) {
                    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
                    $this->insertAction($name, $lastname, $surname, $email, $hashed_pass, $csrf_token);
                } else {
                    $this->listAction('Password verification did not match. Please check and try again');
                }
            } else {
                $this->listAction();
            }
        } else if ($params === 'list') {
            $this->listAction();
        } else if ($params === 'logout') {
            $this->logoutAction();
        } else if ($params === '') {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $email = $_POST['email'];
                $pass = $_POST['password'];
                $csrf_token = $_POST['token'];
                $this->verifyLogin($email, $pass, $csrf_token);
            } else {
                $this->loginAction();
            }
        } else {
            http_response_code(404);
            include('views/404.php');
            die();
        }
    }


}