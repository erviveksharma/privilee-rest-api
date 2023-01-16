<?php
namespace App\Services;

class JSONService
{
    public $jsonPath = null;
    public $records = [];
    
    public function __construct()
    {
        $records = [];
        $this->jsonPath = public_path() . "/records.json";
        if (file_exists($this->jsonPath)) {
            $records = json_decode(file_get_contents($this->jsonPath));
        } else {
            
        }
        $this->records = collect($records);
    }


    public function search(array $filter): array
    {
        $records = $this->records;
        
        if (isset($filter['id']) && !empty($filter['id'])) {
            $records = $this->records->where('id', $filter['id']);
        } 
        
        if (isset($filter['name']) && !empty($filter['name'])) {
            $records = $this->records->filter(function ($value, $key) use ($filter) {
                return stripos($value->name, $filter['name']) === false ? false : true;
            });
        }

        return $records->sortBy('id')->values()->toArray();
    }

    public function set(array $data)
    {
        $records = $this->records->reject(function ($value, $key) use ($data) {
            return (is_array($value) ? $value['id'] : $value->id) == $data['id'];
        });
        $records->push($data);
        $this->records = $records;
    }

    public function save()
    {
        $json = $this->records->toJson();
        $fp = fopen($this->jsonPath, 'w');
        fwrite($fp, $json);
        fclose($fp);
    }

}
