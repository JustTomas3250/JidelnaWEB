<?php

class JidloController extends Controller {
    public function index()
    {
        $jidloModel = $this->loadModel("Jidlo");

        $jidla = $jidloModel->getAll();

        foreach ($jidla as &$jidlo) {
            $img = basename($jidlo['img'] ?? '');
    
            if ($img === '' || !is_file("../public/data/jidla/$img")) {
                $img = 'default.png';
            }
    
            $jidlo['img'] = "/data/jidla/$img";
        }

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