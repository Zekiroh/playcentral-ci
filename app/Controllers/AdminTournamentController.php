<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\GameModel;

class AdminTournamentController extends Controller
{
    public function index()
    {
        $search_query = $this->request->getVar('search');
        $gameModel = new GameModel();
        if ($search_query) {
            $games = $gameModel->searchGames($search_query);
        } else {
            $games = $gameModel->getAllGames();
        }

        return view('admin_tournareg', [
            'games' => $games,
            'search_query' => $search_query
        ]);
    }

    public function saveGame()
    {
        $gameModel = new GameModel();
    
        
        $gameName = $this->request->getPost('name');
        $gameDescription = $this->request->getPost('description');
        $gameImagePath = null;  // Skip image upload for testing
    
        $gameModel->save([
            'name' => $gameName,
            'description' => $gameDescription,
            'image' => $gameImagePath,
        ]);
    
        return redirect()->to('/admin_tournareg');
    }

    public function deleteGame($gameId)
    {
        $gameModel = new GameModel();
        $gameModel->delete($gameId);
        return redirect()->to('/admin_tournareg');
    }

    public function addGame()
    {
        helper(['form', 'url']);
        $validation = \Config\Services::validation();
        
        
        $validation->setRules([
            'name' => 'required|max_length[100]',
            'description' => 'required|min_length[5]',
            'image' => 'uploaded[image]|is_image[image]|max_size[image,1024]|mime_in[image,image/jpg,image/jpeg,image/png]',
        ]);
    
        if ($this->request->getMethod() === 'post') {
            
            $name = $this->request->getPost('name');
            $description = $this->request->getPost('description');
            $image = $this->request->getFile('image');
            $imageName = null;
    
            
            if (!$validation->run([
                'name' => $name,
                'description' => $description,
                'image' => $image,
            ])) {
                
                return redirect()->to('/admin_tournareg/add_game')
                    ->withInput()
                    ->with('validation', $validation->getErrors());
            }
    
            
            if ($image && $image->isValid() && !$image->hasMoved()) {
                
                $imageName = $image->getRandomName();
                
                $image->move(ROOTPATH . 'public/uploads', $imageName);
            }
    
            
            $gameData = [
                'name' => $name,
                'description' => $description,
                'image' => $imageName, 
            ];
    
            
            $gameModel = new GameModel();
            if ($gameModel->saveGame($gameData)) {
                return redirect()->to('/admin_tournareg')->with('success', 'Game added successfully!');
            } else {
                return redirect()->to('/admin_tournareg')->with('error', 'Error saving to database');
            }
        }
    
        return view('add_game');
    }

    public function editGame($gameId)
{
    $gameModel = new GameModel();
    $game = $gameModel->find($gameId);

    if (!$game) {
        return redirect()->to('/admin_tournareg')->with('error', 'Game not found!');
    }

    return view('edit_game', ['game' => $game]);
}

public function updateGame($gameId)
{
    $gameModel = new GameModel();
    $validation = \Config\Services::validation();

   
    $validation->setRules([
        'name' => 'required|max_length[100]',
        'description' => 'required|min_length[5]',
        'image' => 'is_image[image]|max_size[image,1024]|mime_in[image,image/jpg,image/jpeg,image/png]',
    ]);

    if (!$validation->run($this->request->getPost())) {
        return redirect()->to('edit_game/' . $gameId)->withInput()->with('validation', $validation->getErrors());
    }

    
    $gameName = $this->request->getPost('name');
    $gameDescription = $this->request->getPost('description');
    $gameImagePath = $this->request->getPost('current_image');  

    
    $image = $this->request->getFile('image');
    if ($image && $image->isValid() && !$image->hasMoved()) {
        $gameImagePath = $image->getRandomName();
        $image->move(ROOTPATH . 'public/uploads', $gameImagePath);
    }

   
    $gameModel->update($gameId, [
        'name' => $gameName,
        'description' => $gameDescription,
        'image' => $gameImagePath,
    ]);

    return redirect()->to('/admin_tournareg')->with('success', 'Game updated successfully!');
}

}
