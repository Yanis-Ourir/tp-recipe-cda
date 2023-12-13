<?php

namespace App\Http\Controllers;

use App\Interfaces\PersistanceInterface;
use App\Interfaces\RepositoryInterface;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Repositories\RecipeRepository;
use Illuminate\View\View;
use OpenApi\Annotations\OpenApi as OA;


class RecipeController extends Controller
{
    protected RepositoryInterface $repositoryInterface;
    protected PersistanceInterface $persistanceInterface;

    public function __construct(RepositoryInterface $repositoryInterface, PersistanceInterface $persistanceInterface) {
        $this->repositoryInterface = $repositoryInterface;
        $this->persistanceInterface = $persistanceInterface;
    }

    /**
     * @OA\Info(title="Recipe Api", version="1.0"),
     * 
     * @OA\Server(url="http://localhost:8000/api", description="My recipe api"),
     * 
     *  @OA\Get(
     *     path="/recipes",
     *     summary="Get all the recipes of the database",
     *    
     *     @OA\Response(
     *         response=200,
     *         description="List of all recipes",
     *     ),
     * 
     *     @OA\Response(
     *         response=404,
     *         description="Recipe list not found",
     *     ),
     * )
     */


    public function all()
    {
        return $this->repositoryInterface->all();

    }

    /**
     * @OA\Get(
     *      path="/recipe/{id}",
     *      summary="Return the recipe with the matching ID",
     *      @OA\Parameter(
     *      name="id",
     *      in="path",
     *      description="The ID of the recipe",
     *      required=true,
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          )
     *      ),
     * 
     *      @OA\Response(
     *          response=200,
     *          description="Find one recipe by its ID",
     *      ),
     * 
     *      @OA\Response(
     *         response=404,
     *         description="Recipe not found",
     *     ),
     * )
     */

    public function findById(?int $id)
    {
        return $this->repositoryInterface->findById($id);
    }

    /**
     * @OA\Put(
     *     path="/recipe/add",
     *     summary="Modify the matching recipe",
     *     @OA\Parameter(
     *      name="id",
     *      in="path",
     *      description="The ID of the recipe",
     *      required=true,
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          )
     *      ),
     *      
     *       @OA\Response(
     *          response=200,
     *          description="Updated recipe by its ID",
     *      ),
     * 
     *      @OA\Response(
     *         response=404,
     *         description="Recipe not found",
     *     ),
     * )
     */

    public function add(Request $request)
    {
        // ADD recette
       $data = $request->json()->all;
       return $this->persistanceInterface->add($data);
    }

    /**
     * @OA\Post(
     *     path="/recipe/modify/{id}",
     *     summary="Modify the matching recipe",
     *     @OA\Parameter(
     *      name="id",
     *      in="path",
     *      description="The ID of the recipe",
     *      required=true,
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          )
     *      ),
     *      
     *       @OA\Response(
     *          response=200,
     *          description="Updated recipe by its ID",
     *      ),
     * 
     *      @OA\Response(
     *         response=404,
     *         description="Recipe not found",
     *     ),
     * )
     */

    public function update(Request $request, ?int $id)
    {
        $data = $request->json()->all();
        return $this->persistanceInterface->update($id, $data);
    }

    /**
     * * @OA\Delete(
     *      path="/recipe/delete/{id}",
     *      summary="Delete the recipe with the matching ID",
     *      @OA\Parameter(
     *      name="id",
     *      in="path",
     *      description="The ID of the recipe",
     *      required=true,
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          )
     *      ),
     * 
     *      @OA\Response(
     *          response=200,
     *          description="Deleted recipe by its ID",
     *      ),
     * 
     *      @OA\Response(
     *         response=404,
     *         description="Recipe not found",
     *     ),
     * )
     */
    public function deleteById(?int $id)
    {
        return $this->persistanceInterface->deleteById($id);
    }


    /**
     * * @OA\Delete(
     *      path="/recipes/delete/all",
     *      summary="Delete all the recipes",
     *
     * 
     *      @OA\Response(
     *          response=200,
     *          description="Delete everything from the table recipe",
     *      ),
     * 
     *      @OA\Response(
     *         response=404,
     *         description="Recipe not found",
     *     ),
     * )
     */

    public function deleteAll()
    {
        return $this->persistanceInterface->deleteAll();
    }
}
