<?php

namespace App\Imports;
use App\Models\Cartorio;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class CartorioImportar implements WithHeadingRow, ToModel, WithChunkReading, ShouldQueue
{
    public function model(array $row)
    {

      return new Cartorio([
            'nome'              => $row['nome'],
            'razao'             => $row['razao'],
            'documento'         => $row['documento'],
            'cep'               => $row['cep'],
            'endereco'          => $row['endereco'],
            'bairro'            => $row['bairro'],
            'cidade'            => $row['cidade'],
            'uf'                => $row['uf'],
            'telefone'          => $row['telefone'],
            'email'             => strtolower($row['e_mail']),
            'tabeliao'          => $row['tabeliao'],
            'ativo'             => $row['ativo'],
            'user_id'           => Auth::id(),
        ]);

    }


    public function headings(): array
    {
        return ['HSCode','Description','Regulatory_Status','Comment'];
    }

    public function batchSize(): int
    {
        return 0;
    }

    public function chunkSize(): int
    {
        return 0;
    }
}
