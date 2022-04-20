<?php

require_once 'model/GenreLogic.php';
require_once 'model/Display.php';

class GenreController {
    public function __construct() {
        $this->GenreLogic = new GenreLogic();
        $this->Display = new Display();
    }
    public function __destruct() {}
    public function handleRequest() {
        try{

            isset($_GET['con']) === 'admin' ? $_GET['con'] : 'admin';

            $page = isset($_GET['page']) ? $_GET['page'] : '';

            switch ($page) {  
                case 'create': 
                    $this->collectCreateGenre();
                    break;  

                case 'delete':
                    $this->collectDeleteGenre($_REQUEST['id']);
                    break;

                case 'update':
                    $this->collectUpdateGenre($_REQUEST['id']);
                    break;

                case 'read':
                    $this->collectReadGenre($_REQUEST['id']);
                    break;

                case 'search':
                    $this->collectSearchGenre();
                    break;          
                default:
                    # code...
                    $this->collectReadallGenres();
                    break;
            }

        } catch (Exception $e) {
            throw $e;
        }
    }

        public function collectReadallGenres(){

            $page = isset($_GET['number']) ? (int)$_GET['number'] : 1;      
            $perPage = 5;
            $limit = ($page > 1) ? ($page * $perPage) - $perPage : 0;

            // $pages = $this->GenreLogic->pagenav($perPage);

            $res = $this->GenreLogic->readallGenres($limit,$perPage);
            
            $pages = $res[0];
            // $nav = $this->Display->PageNavigation($pages,$page);
            $genre = $this->Display->createTable($res[1], true);
            
            include 'view/admin/genre/genre.php';
        }

        public function collectReadGenre(){

            $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

            $res = $this->GenreLogic->readGenres($id);
            $html = $this->Display->CreateCardGenre($res);

            include 'view/admin/genre/read.php';
        }

        public function collectUpdateGenre(){
            $id = isset($_REQUEST['id']) ? $_REQUEST['id'] :null;
            $name= isset($_REQUEST['categorie_name']) ? $_REQUEST['categorie_name'] :null;

            if (isset($_POST['updateSubmit'])) {
                
                $res = $this->GenreLogic->updateGenre($id, $name);
                $html = $this->GenreLogic->readGenres($id);   
                $html = $this->Display->CreateCard($html);
    
                header("Location: index.php?con=admin&op=genre");
            }
    
            $html = $this->GenreLogic->readGenres($id);
            $html = $html->fetch(PDO::FETCH_ASSOC);
    
            include 'view/admin/genre/update.php';
        }

        public function collectCreateGenre(){

            $categorie_name = isset($_REQUEST['categorie_name']) ? $_REQUEST['categorie_name'] : null;

            if(isset($_POST['Genresubmit'])){

               $check = $this->GenreLogic->createGenre($categorie_name);

                if(isset($check)){
                    $_SESSION['success'] = "Genre is met success toegevoegd";
                    header("Location: index.php?con=admin&op=genre");
                }

            }

            include 'view/admin/genre/create.php';
        }
        
        public function collectDeleteGenre(){

            $id = isset($_REQUEST['id']) ? $_REQUEST['id'] :null;
    
            if (isset($_POST['deletesubmit'])) {

                $html = $this->GenreLogic->deleteGenre($id);
    
                $msg = $html;
            }
    
            $html = $this->GenreLogic->readGenres($id);
            $html = $html->fetch(PDO::FETCH_ASSOC);
    
            include 'view/admin/genre/delete.php';
        }

        public function collectSearchGenre(){

            $search = isset($_REQUEST['search']) ? $_REQUEST['search'] : null;

            if(isset($_POST['searchSubmit'])){

                $html = $this->GenreLogic->searchGenre($search);
                $html = $this->Display->createTable($html, false);

            }

            include 'view/Genres/search.php';
        }
}