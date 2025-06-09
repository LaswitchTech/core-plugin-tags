<?php

/**
 * Core Framework - TagsModel
 *
 * @license    MIT (https://mit-license.org/)
 * @author     Louis Ouellet <louis@laswitchtech.com>
 */

// Import additionnal class into the global namespace
use \LaswitchTech\Core\Abstracts\Model;

class TagsModel extends Model {

    /**
     * Create a tag
     *
     * @param string $tag
     * @return int
     */
    public function create(string $tag): int
    {
        // Check if the tag is empty
        if(empty($tag)){
            return 0;
        }

        // Create a select Query
        $Query = $this->Database->query()
            ->table('tags')
            ->select('id')
            ->where('name', $tag);

        // Retrieve the Results
        $result = $Query->fetch();

        // Check if the Tag already exists
        if($result){
            return $result[0]['id'];
        }

        // Create the Query
        $Query = $this->Database->query()
            ->table('tags')
            ->insert(['name' => $tag]);

        // Execute the Query
        return $Query->execute();
    }
}
