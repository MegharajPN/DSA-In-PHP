<?php

/*

Graphs are a fundamental data structure in computer science used to represent relationships 
between entities. A graph consists of a set of vertices (also called nodes) and a set of edges (also 
called links or connections) that connect these vertices.

Graphs can be classified into two main types: directed graphs (also known as digraphs),where
edges have a direction, and undirected graphs, where edges do not have a direction. Additionally,
graphs can be weighted, meaning each edge has a numerical value associated with it.

*/


class Graph {
    private $vertices;
    private $adjacencyList;

    public function __construct() {
        $this->vertices = [];
        $this->adjacencyList = [];
    }

    public function addVertex($vertex) {
        if (!in_array($vertex, $this->vertices)) {
            $this->vertices[] = $vertex;
            $this->adjacencyList[$vertex] = [];
        }
    }

    public function addEdge($vertex1, $vertex2) {
        if (!array_key_exists($vertex1, $this->adjacencyList)) {
            $this->addVertex($vertex1);
        }
        if (!array_key_exists($vertex2, $this->adjacencyList)) {
            $this->addVertex($vertex2);
        }
        $this->adjacencyList[$vertex1][] = $vertex2;
        $this->adjacencyList[$vertex2][] = $vertex1; // For undirected graph
    }

    public function printGraph() {
        foreach ($this->vertices as $vertex) {
            echo $vertex . ": ";
            foreach ($this->adjacencyList[$vertex] as $adjacentVertex) {
                echo $adjacentVertex . " ";
            }
            echo "\n";
        }
    }
}

// Example usage:
$graph = new Graph();
$graph->addEdge("A", "B");
$graph->addEdge("A", "C");
$graph->addEdge("B", "C");
$graph->addEdge("B", "D");
$graph->addEdge("C", "D");

$graph->printGraph();
?>
