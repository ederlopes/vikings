<?php
/**
 * Created by PhpStorm.
 * User: eder.lopes
 * Date: 17/10/2019
 * Time: 17:08
 */

namespace App\Controllers;

use App\Models\Cartorio;
use DESAFIO21\Controller\ViewName;

class ImportarController extends ViewName
{
    private $objCartorio;

    public function __construct()
    {
        $this->objCartorio = new Cartorio();
    }

    public function index()
    {
        @$this->view->dados = $this->objCartorio->getAll();
        $this->render("index");
    }

}