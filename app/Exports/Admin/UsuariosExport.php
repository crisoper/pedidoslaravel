<?php

namespace App\Exports\Admin;

use App\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;


class UsuariosExport implements FromQuery,  WithTitle, WithHeadings, ShouldAutoSize, WithColumnFormatting, WithMapping
{
    
    use Exportable;
    
    // pasamos el parametro de consulta
    public function withBuscar(string $buscar)
    {
        $this->buscar = $buscar;
        
        return $this;
    }

    /**
     * @return Builder
     */
    public function query()
    {
    	if ( isset( $this->buscar ) ) {
            return User::query()
            		->where('email', 'like', '%'.$this->buscar.'%')
            		->orWhere('name', 'like', '%'.$this->buscar.'%');
    	}
    	else {
    		return User::query();	
    	}
        
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Usuarios';
    }

    /**
     * @return string for Headings
     */
    public function headings(): array
    {
        return [
            'NOMBRE',
            'CORREO',
            'ROLES'
        ];
    }

    /**
     * @return array
     */
    public function map( $usuario ): array
    {
        return [
        	$usuario->name,
        	$usuario->email,
        	$usuario->roles->pluck('name'),
        ];
    }
    
    /**
     * @return array
     */
    public function columnFormats(): array
    {
        return [
        ];
    }

}
