<?php

class JidloController extends Controller {
    public function index()
    {
        $jidloModel = $this->loadModel("Jidlo");

        $jidla = $jidloModel->getAll();
        $this->renderView('Jidlo/Jidla', ["jidla" => $jidla]);
    }

    public function jidlo($id)
    {
        $jidloModel = $this->loadModel("Jidlo");

        $jidlo = $jidloModel->get($id);

        $this->renderView('Jidlo/Jidlo', ["jidlo" => $jidlo], $jidlo['nazev']);
    }
}

?>