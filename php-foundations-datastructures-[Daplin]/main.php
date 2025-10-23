<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Library Organizer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px 0;
        }
        .main-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            padding: 30px;
            margin-bottom: 30px;
        }
        .section-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .category-level-0 {
            font-weight: bold;
            color: #667eea;
            font-size: 1.2em;
            margin-top: 15px;
        }
        .category-level-1 {
            font-weight: bold;
            color: #764ba2;
            margin-left: 20px;
            margin-top: 10px;
        }
        .book-item {
            margin-left: 40px;
            color: #333;
            padding: 5px 0;
        }
        .book-item:hover {
            color: #667eea;
            cursor: pointer;
        }
        .book-card {
            border-left: 4px solid #667eea;
            background: #f8f9fa;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
            transition: all 0.3s;
        }
        .book-card:hover {
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transform: translateX(5px);
        }
        .search-result {
            background: #e8f5e9;
            border-left: 4px solid #4caf50;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
        }
        .not-found {
            background: #ffebee;
            border-left: 4px solid #f44336;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
        }
        .bst-display {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 10px;
            font-family: 'Courier New', monospace;
        }
        .btn-custom {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
        }
        .btn-custom:hover {
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center mb-4">
            <h1 class="text-white"><i class="fas fa-book-reader"></i> Digital Library Organizer</h1>
            <p class="text-white">Explore books with Recursion, Hash Tables & Binary Search Trees</p>
        </div>

        <?php
        // ==================== PART I: RECURSIVE DIRECTORY DISPLAY ====================
        
        $library = [
            "Fiction" => [
                "Fantasy" => ["Harry Potter", "The Hobbit"],
                "Mystery" => ["Sherlock Holmes", "Gone Girl"]
            ],
            "Non-Fiction" => [
                "Science" => ["A Brief History of Time", "The Selfish Gene"],
                "Biography" => ["Steve Jobs", "Becoming"]
            ]
        ];

        function displayLibrary($library, $indent = 0) {
            $output = "";
            foreach ($library as $key => $value) {
                if (is_array($value)) {
                    if ($indent == 0) {
                        $output .= "<div class='category-level-0'><i class='fas fa-folder-open'></i> $key</div>";
                    } else if ($indent == 1) {
                        $output .= "<div class='category-level-1'><i class='fas fa-folder'></i> $key</div>";
                    }
                    $output .= displayLibrary($value, $indent + 1);
                } else {
                    $output .= "<div class='book-item'><i class='fas fa-book'></i> $value</div>";
                }
            }
            return $output;
        }

        // ==================== PART II: HASH TABLE FOR BOOK DETAILS ====================
        
        $bookInfo = [
            "Harry Potter" => ["author" => "J.K. Rowling", "year" => 1997, "genre" => "Fantasy"],
            "The Hobbit" => ["author" => "J.R.R. Tolkien", "year" => 1937, "genre" => "Fantasy"],
            "Sherlock Holmes" => ["author" => "Arthur Conan Doyle", "year" => 1892, "genre" => "Mystery"],
            "Gone Girl" => ["author" => "Gillian Flynn", "year" => 2012, "genre" => "Mystery"],
            "A Brief History of Time" => ["author" => "Stephen Hawking", "year" => 1988, "genre" => "Science"],
            "The Selfish Gene" => ["author" => "Richard Dawkins", "year" => 1976, "genre" => "Science"],
            "Steve Jobs" => ["author" => "Walter Isaacson", "year" => 2011, "genre" => "Biography"],
            "Becoming" => ["author" => "Michelle Obama", "year" => 2018, "genre" => "Biography"]
        ];

        function getBookInfo($title, $bookInfo) {
            if (isset($bookInfo[$title])) {
                $info = $bookInfo[$title];
                return "<div class='book-card'>
                    <h5><i class='fas fa-book'></i> $title</h5>
                    <p><strong>Author:</strong> {$info['author']}</p>
                    <p><strong>Year:</strong> {$info['year']}</p>
                    <p><strong>Genre:</strong> {$info['genre']}</p>
                </div>";
            } else {
                return "<div class='alert alert-danger'><i class='fas fa-exclamation-circle'></i> Book not found: $title</div>";
            }
        }

        // ==================== PART III: BINARY SEARCH TREE ====================
        
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

        class BinarySearchTree {
            public $root;
            
            public function __construct() {
                $this->root = null;
            }
            
            public function insert($data) {
                $newNode = new Node($data);
                
                if ($this->root === null) {
                    $this->root = $newNode;
                } else {
                    $this->insertNode($this->root, $newNode);
                }
            }
            
            private function insertNode($node, $newNode) {
                if (strcasecmp($newNode->data, $node->data) < 0) {
                    if ($node->left === null) {
                        $node->left = $newNode;
                    } else {
                        $this->insertNode($node->left, $newNode);
                    }
                } else {
                    if ($node->right === null) {
                        $node->right = $newNode;
                    } else {
                        $this->insertNode($node->right, $newNode);
                    }
                }
            }
            
            public function search($data) {
                return $this->searchNode($this->root, $data);
            }
            
            private function searchNode($node, $data) {
                if ($node === null) {
                    return false;
                }
                
                if (strcasecmp($data, $node->data) == 0) {
                    return true;
                } else if (strcasecmp($data, $node->data) < 0) {
                    return $this->searchNode($node->left, $data);
                } else {
                    return $this->searchNode($node->right, $data);
                }
            }
            
            public function inorderTraversal($node = null, $isFirst = true) {
                static $result = [];
                
                if ($isFirst) {
                    $result = [];
                    $node = $this->root;
                }
                
                if ($node !== null) {
                    $this->inorderTraversal($node->left, false);
                    $result[] = $node->data;
                    $this->inorderTraversal($node->right, false);
                }
                
                return $result;
            }
        }

        // Create and populate BST
        $bst = new BinarySearchTree();
        $allBooks = ["Harry Potter", "The Hobbit", "Sherlock Holmes", "Gone Girl", 
                     "A Brief History of Time", "The Selfish Gene", "Steve Jobs", "Becoming"];
        
        foreach ($allBooks as $book) {
            $bst->insert($book);
        }

        // Handle form submissions
        $searchBookTitle = "";
        $searchTitles = [];
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['search_book'])) {
                $searchBookTitle = $_POST['book_title'];
            }
            if (isset($_POST['search_bst'])) {
                $searchInput = $_POST['bst_search'];
                $searchTitles = array_map('trim', explode(',', $searchInput));
            }
        }
        ?>

        <!-- PART I: Recursive Directory Display -->
        <div class="main-container">
            <div class="section-header">
                <h3><i class="fas fa-sitemap"></i> Part I: Library Categories (Recursive Display)</h3>
            </div>
            <?php echo displayLibrary($library); ?>
        </div>

        <!-- PART II: Hash Table Book Details -->
        <div class="main-container">
            <div class="section-header">
                <h3><i class="fas fa-info-circle"></i> Part II: Book Details (Hash Table)</h3>
            </div>
            <form method="POST" class="mb-4">
                <div class="form-group">
                    <label for="book_title"><strong>Search for a book:</strong></label>
                    <select name="book_title" id="book_title" class="form-control">
                        <option value="">-- Select a book --</option>
                        <?php foreach ($allBooks as $book): ?>
                            <option value="<?php echo $book; ?>" <?php echo ($searchBookTitle == $book) ? 'selected' : ''; ?>>
                                <?php echo $book; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" name="search_book" class="btn btn-custom">
                    <i class="fas fa-search"></i> Get Book Info
                </button>
            </form>
            
            <?php 
            if ($searchBookTitle != "") {
                echo getBookInfo($searchBookTitle, $bookInfo);
            }
            ?>
        </div>

        <!-- PART III: Binary Search Tree -->
        <div class="main-container">
            <div class="section-header">
                <h3><i class="fas fa-tree"></i> Part III: Binary Search Tree</h3>
            </div>
            
            <div class="mb-4">
                <h5>Inorder Traversal (Alphabetical Order):</h5>
                <div class="bst-display">
                    <?php
                    $sortedBooks = $bst->inorderTraversal();
                    foreach ($sortedBooks as $book) {
                        echo "<div><i class='fas fa-chevron-right'></i> $book</div>";
                    }
                    ?>
                </div>
            </div>

            <form method="POST">
                <div class="form-group">
                    <label for="bst_search"><strong>Search for books in BST:</strong></label>
                    <input type="text" name="bst_search" id="bst_search" class="form-control" 
                           placeholder="Enter book titles separated by commas (e.g., The Hobbit, Inferno)">
                </div>
                <button type="submit" name="search_bst" class="btn btn-custom">
                    <i class="fas fa-search"></i> Search BST
                </button>
            </form>

            <?php if (!empty($searchTitles)): ?>
                <div class="mt-4">
                    <h5>Search Results:</h5>
                    <?php foreach ($searchTitles as $title): ?>
                        <?php if ($title != ""): ?>
                            <?php if ($bst->search($title)): ?>
                                <div class="search-result">
                                    <i class="fas fa-check-circle"></i> <strong><?php echo htmlspecialchars($title); ?></strong>: Found!
                                </div>
                            <?php else: ?>
                                <div class="not-found">
                                    <i class="fas fa-times-circle"></i> <strong><?php echo htmlspecialchars($title); ?></strong>: Not Found.
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>