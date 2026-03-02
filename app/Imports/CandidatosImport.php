<?php
namespace App\Imports;

use App\Models\Candidato;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow; // IMPORTANTE
use Maatwebsite\Excel\Concerns\SkipsEmptyRows; // Para ignorar linhas brancas no fim

class CandidatosImport implements ToModel, WithStartRow, SkipsEmptyRows
{
    /**
     * Define em que linha os dados começam
     */
    public function startRow(): int
    {
        return 17; // Começa a ler exatamente na linha 17
    }

    public function model(array $row)
    {
        // Agora o $row[0] será a Coluna A da linha 17
        // O $row[1] será a Coluna B da linha 17, e assim por diante.

        // Validação simples: se a coluna do código estiver vazia, ignora a linha
        if (empty($row[0])) {
            return null;
        }
// dd($row);
        return new Candidato([
             'codigo'        => (string) $row[2],
            'nome_completo' => $row[1],
            'curso'         => $row[4],
            'resultado'     => $row[3],
        ]);
    }
}