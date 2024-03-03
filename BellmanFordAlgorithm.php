<?php

/*

The Bellman-Ford Algorithm is another algorithm used to find the shortest paths from a single source
vertex to all other vertices in a graph, including graphs with negative edge weights. It is slower than
Dijkstra's Algorithm but more versatile as it can handle negative edge weights and detect negative
weight cycles.

Here's an explanation of the Bellman-Ford Algorithm along with a PHP implementation:

Explanation of the Bellman-Ford Algorithm:

1. Initialization: Assign a tentative distance value to every vertex. Set the distance of the source vertex to
0 and all other vertices to infinity.

2. Relaxation: Repeat the following relaxation step for |V| - 1 iterations, where |V| is the number of vertices in the graph:
    --->For each edge (u, v) in the graph, if the current distance of vertex u plus the weight of the edge (u, v) is less than 
        the current distance of vertex v, update the distance of vertex v to this new value.

3.Negative Cycle Detection: After |V| - 1 iterations of relaxation, perform one additional iteration. 
If any distances are updated during this iteration, it indicates the presence of a negative weight cycle in the graph.

4.Output: The tentative distances to all vertices represent the shortest paths from the source vertex, 
unless a negative weight cycle is detected.

In this implementation:

    --->$graph represents the weighted graph in adjacency list format.
    --->The shortestPath() method computes the shortest paths from a given source vertex using the Bellman-Ford Algorithm.
    --->The result is an associative array $shortestPaths where each key represents a vertex and the corresponding value represents 
        the shortest distance from the source vertex. If a negative weight cycle is detected, it prints a message indicating the 
        presence of the cycle.

*/

class BellmanFord
{
    public function shortestPath($graph, $source)
    {
        $distances = [];
        $vertices = array_keys($graph);
        $numVertices = count($vertices);

        // Step 1: Initialization
        foreach ($vertices as $vertex) {
            $distances[$vertex] = INF;
        }
        $distances[$source] = 0;

        // Step 2: Relaxation
        for ($i = 1; $i <= $numVertices - 1; $i++) {
            foreach ($graph as $u => $edges) {
                foreach ($edges as $v => $weight) {
                    if ($distances[$u] != INF && $distances[$u] + $weight < $distances[$v]) {
                        $distances[$v] = $distances[$u] + $weight;
                    }
                }
            }
        }

        // Step 3: Negative Cycle Detection
        foreach ($graph as $u => $edges) {
            foreach ($edges as $v => $weight) {
                if ($distances[$u] != INF && $distances[$u] + $weight < $distances[$v]) {
                    echo "Graph contains a negative weight cycle\n";
                    return null;
                }
            }
        }

        return $distances;
    }
}

// Example usage:
$graph = [
    'A' => ['B' => -1, 'C' => 4],
    'B' => ['C' => 3, 'D' => 2, 'E' => 2],
    'C' => [],
    'D' => ['B' => 1, 'C' => 5],
    'E' => ['D' => -3]
];

$bellmanFord = new BellmanFord();
$source = 'A';
$shortestPaths = $bellmanFord->shortestPath($graph, $source);

// Output shortest paths
if ($shortestPaths !== null) {
    foreach ($shortestPaths as $vertex => $distance) {
        echo "Shortest distance from $source to $vertex: $distance\n";
    }
}
