<?php

namespace App\Models;

use CodeIgniter\Model;

class GameModel extends Model
{
    protected $table = 'games';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description', 'image'];

    
    protected $validationRules = [
        'name' => 'required|max_length[100]',
        'description' => 'required|min_length[5]',
        'image' => 'is_image[image]|max_size[image,9024]|mime_in[image,image/jpg,image/jpeg,image/png]',
    ];

    
    protected $validationMessages = [
        'name' => [
            'required' => 'The game name is required.',
            'max_length' => 'The game name cannot be more than 100 characters.',
        ],
        'description' => [
            'required' => 'The description is required.',
            'min_length' => 'The description must be at least 5 characters long.',
        ],
        'image' => [
            'is_image' => 'The file you uploaded is not a valid image.',
            'max_size' => 'The image size must not exceed 9MB.',
            'mime_in' => 'The image must be a JPG, JPEG, or PNG file.',
        ],
    ];

    
    public function getAllGames()
    {
        return $this->findAll();
    }

    
    public function searchGames($search_query)
    {
        return $this->like('name', $search_query)->findAll();
    }

    
    public function saveGame($data)
    {
        
        if (!$this->validate($data)) {
            log_message('error', 'Game validation failed: ' . print_r($this->errors(), true));
            return false;
        }
    
        
        if (!$this->save($data)) {
            log_message('error', 'Failed to save game: ' . print_r($data, true));
            return false;
        }
    
        return true;
    }

    
    public function updateGame($gameId, $data)
    {
        
        if (!$this->validate($data)) {
            log_message('error', 'Game validation failed during update: ' . print_r($this->errors(), true));
            return false;
        }

        
        $this->update($gameId, $data);
        return true;
    }
}
