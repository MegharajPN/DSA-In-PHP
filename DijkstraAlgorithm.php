<?php

/*

Dijkstra's Algorithm is a popular algorithm used to find the shortest path from a single source vertex to
all other vertices in a weighted graph with non-negative edge weights. 
Here's an explanation of Dijkstra's Algorithm along with a PHP implementation:

Explanation of Dijkstra's Algorithm:

1.Initialization: Assign a tentative distance value to every vertex. Set the distance of the source vertex to
0 and all other vertices to infinity. Maintain a priority queue (or min-heap) to store vertices based on
their tentative distances.

2. Iterative Process: Repeat the following steps until all vertices have been visited or the priority queue is empty:

--> Extract the vertex with the smallest tentative distance from the priority queue.
--> For each neighbor of the extracted vertex, calculate the sum of the tentative distance from the
    source vertex to the extracted vertex and the weight of the edge connecting the extracted vertex to
    its neighbor. If this sum is smaller than the current tentative distance of the neighbor, update the
    tentative distance of the neighbor.

3.Termination: The algorithm terminates when all vertices have been visited or the priority queue is empty.

4.Output: After the algorithm terminates, the tentative distances to all vertices represent the shortest paths from the source vertex.

In this implementation:

---> $graph represents the weighted graph in adjacency list format.
---> The shortestPath() method computes the shortest paths from a given source vertex using Dijkstra's algorithm.
---> The result is an associative array $shortestPaths where each key represents a vertex and 
    the corresponding value represents the shortest distance from the source vertex.

*/

class Dijkstra
{
    public function shortestPath($graph, $source)
    {
        $distances = [];
        $visited = [];
        $pq = new SplPriorityQueue();

        // Initialize distances
        foreach ($graph as $vertex => $neighbors) {
            $distances[$vertex] = INF;
        }
        $distances[$source] = 0;

        // Add source vertex to priority queue
        $pq->insert($source, 0);

        while (!$pq->isEmpty()) {
            $current = $pq->extract();

            if (isset($visited[$current])) continue;
            $visited[$current] = true;

            foreach ($graph[$current] as $neighbor => $weight) {
                $alt = $distances[$current] + $weight;
                if ($alt < $distances[$neighbor]) {
                    $distances[$neighbor] = $alt;
                    $pq->insert($neighbor, -$alt); // Negative value for minimum priority
                }
            }
        }

        return $distances;
    }
}

// Example usage:
$graph = [
    'A' => ['B' => 3, 'C' => 5],
    'B' => ['A' => 3, 'C' => 2, 'D' => 6],
    'C' => ['A' => 5, 'B' => 2, 'D' => 4],
    'D' => ['B' => 6, 'C' => 4]
];

$dijkstra = new Dijkstra();
$source = 'A';
$shortestPaths = $dijkstra->shortestPath($graph, $source);

// Output shortest paths
foreach ($shortestPaths as $vertex => $distance) {
    echo "Shortest distance from $source to $vertex: $distance\n";
}
