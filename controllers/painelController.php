<?php
class painelController
{

    public function __construct()
    {
        include_once '../model/Dao.php';
    }

    public function listarCurriculos()
    {
        $listarCurriculos = new cadastroModel();
        $listarCurriculos = $listarCurriculos->listarCurriculos();
        if ($listarCurriculos != '') {
            $total = 0;
            foreach ($listarCurriculos as $curriculo) {
                $pretensaoSalarial = $curriculo->PretensaoSalarial;
                if (is_numeric($pretensaoSalarial)) {
                    $total += $pretensaoSalarial;
                }
            }
            $count = count($listarCurriculos);
            $media = $count > 0 ? $total / $count : 0;
            $total = number_format($total, 3, ',', '.');
            return [
                '0' => $listarCurriculos,
                '1' => $total,
                '2' => $media
            ];
        } else {
            return [
                '0' => 0,
                '1' => 0,
                '2' => 0
            ];
        }
    }
}
