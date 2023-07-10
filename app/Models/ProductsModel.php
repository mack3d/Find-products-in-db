<?php

namespace App\Models;

use App\Utils\DBConnection;

class ProductsModel
{
    private $db;
    private $table = 'fpp';
    private $limit = 100;
    private $offset = 0;
    private $orderBy = 'kodn';
    private $sort = 'ASC';

    public function __construct()
    {
        $dbConnection = new DBConnection();
        $this->db = $dbConnection->getConnection();
    }

    public function getProducts($params)
    {
        $query = $this->buildQuery($params);
        $query .= " ORDER BY $this->orderBy $this->sort LIMIT $this->offset, $this->limit";
        $stmt = $this->db->query($query);
        $products = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $products;
    }

    private function buildQuery($params)
    {

        return "SELECT * FROM $this->table";
    }
}
