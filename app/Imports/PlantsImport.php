<?php

namespace App\Imports;

use App\Models\Plant;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class PlantsImport implements ToModel, WithHeadingRow
{
    private $isTableEnd = false;
    private $terminationMarker = 'END_OF_TABLE';
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if ($this->isTableEnd) {
            return null; // Stop reading rows beyond the table
        }

        // Check if the termination marker is found in the row
        if (in_array($this->terminationMarker, $row)) {
            $this->isTableEnd = true;
            return null; // Stop reading rows beyond the table
        }

        $uniqid = uniqid('plant_');
        $kategori = Category::where('nama', $row['kategori'])->first(['id']);
        // $thumbnail = $row['image_column']->store('tanaman/' . $uniqid);
        $location = Location::where('nama', $row['lokasi'])->first(['id']);
        if (!isset($kategori->id) || !isset($location->id)) {
            dd($row, $kategori, $location);
        }
        return new Plant([
            'nama' => $row['nama_tanaman'],
            'category_id' => $kategori->id,
            'location_id' => $location->id,
            'khasiat' => $row['manfaat'],
            'latin' => $row['nama_latin'],
            'uniqid' => $uniqid,
            'thumbnail' => $row['foto'],
            'deskripsi' => $row['deskripsi']
        ]);
    }
}
