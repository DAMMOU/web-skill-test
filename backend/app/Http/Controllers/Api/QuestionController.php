<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreQuestionRequest;
use App\Http\Requests\Api\UpdateQuestionRequest;
use App\Models\Question;
use Exception;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::all();
        return response()->json($questions, 200);
    }

    public function create()
    {
        return view('nom_de_votre_vue_create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuestionRequest $request)
    {
        try{
            // Création d'une nouvelle question
            $question = Question::create([
                'test_category_id' => $request->input('test_category_id'),
                'test_level_id' => $request->input('test_level_id'),
                'content' => $request->input('content'),
                'type' => $request->input('type'),
            ]);
            
            // Répondre json
            return response()->json([
                'satus_code' => 201,
                'status_message' => 'the question has been created',
                'data' => $question
            ]);

        }catch(Exception $e){
            return response()->json($e);
        }
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $questions = Question::find($id);
        return response()->json($questions, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $question = Question::find($id);

        if ($question) {
            // Vous pouvez passer la question à la vue
            return view('votre_vue_edit', compact('question'));
        } else {
            // Si la question n'est pas trouvée, vous pouvez rediriger ou retourner une autre vue
            return view('vue_non_trouvee');
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuestionRequest $request, $id)
    {
        $question = Question::find($id);

        if ($question) {
            try {
                // Mise à jour de la question existante
                $question->update([
                    'test_category_id' => $request->input('test_category_id'),
                    'test_level_id' => $request->input('test_level_id'),
                    'content' => $request->input('content'),
                    'type' => $request->input('type'),
                ]);

                // Répondre json
                return response()->json([
                    'status_code' => 200, // Utiliser 200 pour une mise à jour réussie
                    'status_message' => 'La question a été mise à jour avec succès',
                    'data' => $question,
                ]);

            } catch (Exception $e) {
                return response()->json([
                    'status_code' => 500, // Utiliser 500 pour une erreur interne du serveur
                    'status_message' => 'Erreur lors de la mise à jour de la question',
                    'error' => $e->getMessage(),
                ]);
            }
        } else {
            return response()->json([
                'status_code' => 404, // Utiliser 404 pour indiquer que la ressource n'a pas été trouvée
                'status_message' => 'La question n\'existe pas',
            ]);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $question = Question::find($id);

        if ($question) {
            try {
                // Suppression de la question
                $question->delete();

                return response()->json([
                    'status_code' => 200, // Utiliser 200 pour une suppression réussie
                    'status_message' => 'La question a été supprimée avec succès',
                ]);

            } catch (Exception $e) {
                return response()->json([
                    'status_code' => 500, // Utiliser 500 pour une erreur interne du serveur
                    'status_message' => 'Erreur lors de la suppression de la question',
                    'error' => $e->getMessage(),
                ]);
            }
        } else {
            return response()->json([
                'status_code' => 404, // Utiliser 404 pour indiquer que la ressource n'a pas été trouvée
                'status_message' => 'La question n\'existe pas',
            ]);
        }
    }

}
