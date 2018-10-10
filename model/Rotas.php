<?php
/**
 * Created by PhpStorm.
 * Autor: Max Bilio
 * Date: 10/10/2018
 * Time: 00:30
 */

class Rotas
{
    private static $pasta_controller = 'contoller';
    private static $pasta_view = 'view';
    private static $pasta_ADM = 'adm';

    public static $pag;

    /*** Trata paginas e parametros da URL */

    static function get_Pagina()
    {
        // verifico se passou parametro na URL
        if (isset($_GET['pag'])):

            $pagina = $_GET['pag'];

            // separa a URL pela barra e gera os parametros
            self::$pag = explode('/', $pagina);

            $barra = DIRECTORY_SEPARATOR;

            $pagina = self::$pasta_controller . $barra . self::$pag[0] . '.php';

            // verifico se existe pagina com nome passado na URL
            if (file_exists($pagina)):
                include $pagina;

            // se nao existe o aquivo mostra erro
            else:
                echo 'Arquivo não encontrado :' . $pagina;
                include 'erro.php';

            endif;
        // se não passou nada pela URL
        else:
            include 'home.php';
        endif;
    }


}