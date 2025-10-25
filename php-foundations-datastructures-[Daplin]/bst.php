<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Binary Search Tree</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #C71585 0%, #FF1493 100%);
            min-height: 100vh;
            padding: 40px 0;
        }
        .main-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            padding: 40px;
            max-width: 1000px;
            margin: 0 auto;
        }
        .header {
            background: linear-gradient(135deg, #C71585 0%, #FF1493 100%);
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            text-align: center;
        }
        .description {
            background: #ffe0f0;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            border-left: 4px solid #C71585;
        }
        .bst-display {
            background: #f5f5f5;
            padding: 25px;
            border-radius: 10px;
            font-family: 'Courier New', monospace;
            margin-bottom: 30px;
            box-shadow: inset 0 2px 10px rgba(0,0,0,0.1);
            max-height: 500px;
            overflow-y: auto;
        }
        .bst-node {
            padding: 8px 12px;
            margin: 5px 0;
            background: white;
            border-left: 3px solid #C71585;
            border-radius: 5px;
            transition: all 0.3s;
        }
        .bst-node:hover {
            background: #ffe0f0;
            transform: translateX(5px);
        }
        .search-form {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        .search-result {
            background: #e8f5e9;
            border-left: 4px solid #4caf50;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            animation: slideIn 0.3s ease;
        }
        .not-found {
            background: #ffebee;
            border-left: 4px solid #f44336;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            animation: slideIn 0.3s ease;
        }
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .btn-custom {
            background: linear-gradient(135deg, #C71585 0%, #FF1493 100%);
            border: none;
            color: white;
            padding: 10px 30px;
        }
        .btn-custom:hover {
            background: linear-gradient(135deg, #FF1493 0%, #C71585 100%);
            color: white;
            transform: translateY(-2px);
        }
        .stats-card {
            background: linear-gradient(135deg, #f5f5f5 0%, #ffffff 100%);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            border-left: 4px solid #C71585;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        .tree-visual {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            border: 2px solid #C71585;
            text-align: center;
        }
        .code-box {
            background: #263238;
            color: #aed581;
            padding: 20px;
            border-radius: 10px;
            margin-top: 30px;
            font-family: 'Courier New', monospace;
            font-size: 0.9em;
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="main-container">
            <div class="header">
                <h1><i class="fas fa-project-diagram"></i> Part III: Binary Search Tree</h1>
                <p class="mb-0">Efficient Book Organization & Search</p>
            </div>

            <div class="description">
                <h5><i class="fas fa-info-circle"></i> About This Module</h5>
                <p><strong>Purpose:</strong> Implement a Binary Search Tree data structure for efficient insertion, searching, and ordered traversal of book titles.</p>
                <p><strong>Concept:</strong> BST maintains sorted order where left children are smaller and right children are larger than parent nodes, enabling O(log n) average-case operations.</p>
                <p class="mb-0"><strong>Operations:</strong> Insert books, search by title, and display in alphabetical order using inorder traversal.</p>
            </div>

            <?php
            /**
             * Node class representing each node in the BST
             */
            class Node {
                public $data;
                public $left;
                public $right;
                
                public function __construct($data) {
                    $this->data = $data;
                    $this->left = null;
                    $this->right = null;
                }
            }

            /**
             * Binary Search Tree implementation
             */
            class BinarySearchTree {
                public $root;
                private $nodeCount;
                
                public function __construct() {
                    $this->root = null;
                    $this->nodeCount = 0;
                }
                
                /**
                 * Insert a new book title into the BST
                 */
                public function insert($data) {
                    $newNode = new Node($data);
                    
                    if ($this->root === null) {
                        $this->root = $newNode;
                        $this->nodeCount++;
                    } else {
                        $this->insertNode($this->root, $newNode);
                        $this->nodeCount++;
                    }
                }
                
                /**
                 * Recursive helper to insert node in correct position
                 */
                private function insertNode(&$node, $newNode) {
                    if (strcasecmp($newNode->data, $node->data) < 0) {
                        // Go to left subtree
                        if ($node->left === null) {
                            $node->left = $newNode;
                        } else {
                            $this->insertNode($node->left, $newNode);
                        }
                    } else {
                        // Go to right subtree
                        if ($node->right === null) {
                            $node->right = $newNode;
                        } else {
                            $this->insertNode($node->right, $newNode);
                        }
                    }
                }
                
                /**
                 * Search for a book title in the BST
                 */
                public function search($data) {
                    return $this->searchNode($this->root, $data);
                }
                
                /**
                 * Recursive helper to search for a node
                 */
                private function searchNode($node, $data) {
                    if ($node === null) {
                        return false;
                    }
                    
                    $comparison = strcasecmp($data, $node->data);
                    
                    if ($comparison == 0) {
                        return true;
                    } else if ($comparison < 0) {
                        return $this->searchNode($node->left, $data);
                    } else {
                        return $this->searchNode($node->right, $data);
                    }
                }
                
                /**
                 * Inorder traversal - returns books in alphabetical order
                 */
                public function inorderTraversal($node = null, $isFirst = true) {
                    static $result = [];
                    
                    if ($isFirst) {
                        $result = [];
                        if ($node === null) {
                            $node = $this->root;
                        }
                    }
                    
                    if ($node !== null) {
                        $this->inorderTraversal($node->left, false);
                        $result[] = $node->data;
                        $this->inorderTraversal($node->right, false);
                    }
                    
                    return $result;
                }
                
                /**
                 * Get total number of nodes
                 */
                public function getNodeCount() {
                    return $this->nodeCount;
                }
                
                /**
                 * Calculate tree height
                 */
                public function getHeight($node = null, $isFirst = true) {
                    if ($isFirst) {
                        $node = $this->root;
                    }
                    
                    if ($node === null) {
                        return 0;
                    }
                    
                    $leftHeight = $this->getHeight($node->left, false);
                    $rightHeight = $this->getHeight($node->right, false);
                    
                    return max($leftHeight, $rightHeight) + 1;
                }
            }

            // Create BST and populate with books
            $bst = new BinarySearchTree();
            $allBooks = [
                "Harry Potter", 
                "The Hobbit", 
                "Sherlock Holmes", 
                "Gone Girl",
                "A Brief History of Time", 
                "The Selfish Gene", 
                "Steve Jobs", 
                "Becoming",
                "Dune",
                "1984",
                "The Great Gatsby",
                "To Kill a Mockingbird",
                "Pride and Prejudice",
                "The Catcher in the Rye",
                "Animal Farm",
                "The Name of the Wind",
                "The Girl with the Dragon Tattoo",
                "The Martian",
                "Cosmos",
                "Educated",
                "Sapiens",
                "Guns, Germs, and Steel",
                "Jane Eyre",
                "Wuthering Heights"
            ];
            
            foreach ($allBooks as $book) {
                $bst->insert($book);
            }

            // Handle search form submission
            $searchTitles = [];
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search_bst'])) {
                $searchInput = $_POST['bst_search'];
                $searchTitles = array_map('trim', explode(',', $searchInput));
            }
            ?>

            <!-- Statistics -->
            <div class="stats-card">
                <h5><i class="fas fa-chart-bar"></i> BST Statistics</h5>
                <div class="row">
                    <div class="col-md-4">
                        <strong>Total Books:</strong> <?php echo $bst->getNodeCount(); ?>
                    </div>
                    <div class="col-md-4">
                        <strong>Tree Height:</strong> <?php echo $bst->getHeight(); ?>
                    </div>
                    <div class="col-md-4">
                        <strong>Root Node:</strong> <?php echo $bst->root ? $bst->root->data : 'Empty'; ?>
                    </div>
                </div>
            </div>

            <!-- Inorder Traversal Display -->
            <div class="tree-visual">
                <h5><i class="fas fa-sort-alpha-down"></i> Inorder Traversal (Alphabetical Order)</h5>
                <p class="text-muted">Books displayed in sorted order using recursive traversal</p>
            </div>
            
            <div class="bst-display">
                <?php
                $sortedBooks = $bst->inorderTraversal();
                foreach ($sortedBooks as $index => $book) {
                    echo "<div class='bst-node'>";
                    echo "<i class='fas fa-chevron-right'></i> " . ($index + 1) . ". " . htmlspecialchars($book);
                    echo "</div>";
                }
                ?>
            </div>

            <!-- Search Form -->
            <div class="search-form">
                <h5><i class="fas fa-search"></i> Search Books in BST</h5>
                <form method="POST">
                    <div class="form-group">
                        <label for="bst_search"><strong>Enter book titles to search (comma-separated):</strong></label>
                        <input type="text" name="bst_search" id="bst_search" class="form-control form-control-lg" 
                               placeholder="e.g., The Hobbit, Inferno, 1984" required>
                        <small class="form-text text-muted">
                            Search is case-insensitive. Try searching for books that exist or don't exist!
                        </small>
                    </div>
                    <button type="submit" name="search_bst" class="btn btn-custom btn-lg">
                        <i class="fas fa-search"></i> Search BST
                    </button>
                </form>
            </div>

            <!-- Search Results -->
            <?php if (!empty($searchTitles)): ?>
                <div class="mt-4">
                    <h5><i class="fas fa-list-check"></i> Search Results:</h5>
                    <?php foreach ($searchTitles as $title): ?>
                        <?php if ($title != ""): ?>
                            <?php if ($bst->search($title)): ?>
                                <div class="search-result">
                                    <i class="fas fa-check-circle"></i> 
                                    <strong>"<?php echo htmlspecialchars($title); ?>"</strong> - 
                                    <span class="text-success">Found in BST!</span>
                                </div>
                            <?php else: ?>
                                <div class="not-found">
                                    <i class="fas fa-times-circle"></i> 
                                    <strong>"<?php echo htmlspecialchars($title); ?>"</strong> - 
                                    <span class="text-danger">Not Found in BST</span>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <!-- Code Explanation -->
            <div class="code-box">
                <h5 style="color: #81c784;"><i class="fas fa-code"></i> BST Key Concepts:</h5>
                <p style="color: #aed581;">
                <strong>1. Node Structure:</strong> Each node contains data and pointers to left/right children<br>
                <strong>2. Binary Search Property:</strong> Left subtree &lt; Parent &lt; Right subtree<br>
                <strong>3. Insertion:</strong> O(log n) average - recursively find correct position<br>
                <strong>4. Search:</strong> O(log n) average - compare and traverse left or right<br>
                <strong>5. Inorder Traversal:</strong> Left → Root → Right produces sorted order<br>
                <strong>6. Time Complexity:</strong> Best/Avg O(log n), Worst O(n) for skewed tree
                </p>
            </div>

            <!-- Quick Reference -->
            <div class="alert alert-info mt-4">
                <h5><i class="fas fa-lightbulb"></i> When to Use BST:</h5>
                <ul class="mb-0">
                    <li><strong>Sorted Data:</strong> When you need to maintain data in sorted order</li>
                    <li><strong>Range Queries:</strong> Finding all elements between two values</li>
                    <li><strong>Dynamic Sets:</strong> Frequent insertions and deletions</li>
                    <li><strong>Priority Queues:</strong> When combined with heap properties</li>
                    <li><strong>Database Indexing:</strong> B-trees are an extension of BST</li>
                </ul>
            </div>

            <!-- Available Books List -->
            <div class="mt-5">
                <h5><i class="fas fa-list"></i> Available Books for Testing:</h5>
                <div class="row">
                    <?php 
                    $chunks = array_chunk($allBooks, ceil(count($allBooks) / 3));
                    foreach ($chunks as $chunk): 
                    ?>
                        <div class="col-md-4">
                            <ul class="list-group">
                                <?php foreach ($chunk as $book): ?>
                                    <li class="list-group-item">
                                        <i class="fas fa-book"></i> <?php echo htmlspecialchars($book); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="hashtable.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Previous: Hash Table</a>
                <a href="main.php" class="btn btn-primary"><i class="fas fa-home"></i> Back to Main</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>