<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Library Organizer - Complete System</title>
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
            max-width: 1200px;
            margin: 0 auto;
        }
        .hero-header {
            background: linear-gradient(135deg, #C71585 0%, #FF1493 100%);
            color: white;
            padding: 40px;
            border-radius: 15px;
            margin-bottom: 40px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(199,21,133,0.3);
        }
        .hero-header h1 {
            font-size: 2.5em;
            margin-bottom: 15px;
        }
        .feature-card {
            background: white;
            border: 2px solid #ffe0f0;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            transition: all 0.3s;
            cursor: pointer;
            height: 100%;
        }
        .feature-card:hover {
            border-color: #C71585;
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(199,21,133,0.3);
        }
        .feature-icon {
            font-size: 4em;
            color: #C71585;
            margin-bottom: 20px;
        }
        .feature-card h3 {
            color: #C71585;
            margin-bottom: 15px;
        }
        .stats-section {
            background: linear-gradient(135deg, #ffe0f0 0%, #fff 100%);
            padding: 30px;
            border-radius: 15px;
            margin: 40px 0;
            border-left: 5px solid #C71585;
        }
        .stat-box {
            text-align: center;
            padding: 20px;
        }
        .stat-number {
            font-size: 3em;
            font-weight: bold;
            color: #C71585;
        }
        .stat-label {
            color: #666;
            font-size: 1.1em;
        }
        .btn-custom {
            background: linear-gradient(135deg, #C71585 0%, #FF1493 100%);
            border: none;
            color: white;
            padding: 12px 35px;
            font-size: 1.1em;
            border-radius: 25px;
            transition: all 0.3s;
        }
        .btn-custom:hover {
            background: linear-gradient(135deg, #FF1493 0%, #C71585 100%);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(199,21,133,0.4);
        }
        .integrated-demo {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 15px;
            margin: 30px 0;
        }
        .library-tree {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin: 15px 0;
            border-left: 4px solid #C71585;
            font-family: 'Courier New', monospace;
            max-height: 500px;
            overflow-y: auto;
        }
        .category {
            color: #C71585;
            font-weight: bold;
            font-size: 1.1em;
            margin: 8px 0;
            cursor: pointer;
        }
        .category:hover {
            background: #ffe0f0;
            padding-left: 5px;
        }
        .subcategory {
            color: #FF1493;
            font-weight: bold;
            margin: 5px 0;
        }
        .book-item {
            color: #333;
            margin: 3px 0;
            cursor: pointer;
            transition: all 0.3s;
            padding: 5px;
            border-radius: 3px;
        }
        .book-item:hover {
            background: #ffe0f0;
            transform: translateX(5px);
            color: #C71585;
        }
        .book-details-popup {
            background: linear-gradient(135deg, #ffe0f0 0%, #fff 100%);
            border-left: 4px solid #C71585;
            padding: 25px;
            margin: 20px 0;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            animation: slideIn 0.5s ease;
        }
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .search-bar {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            margin: 20px 0;
        }
        .bst-preview {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin: 15px 0;
            max-height: 400px;
            overflow-y: auto;
        }
        .bst-node-preview {
            padding: 8px 12px;
            margin: 5px 0;
            background: #f5f5f5;
            border-left: 3px solid #C71585;
            border-radius: 5px;
            transition: all 0.3s;
            cursor: pointer;
        }
        .bst-node-preview:hover {
            background: #ffe0f0;
            transform: translateX(5px);
        }
        .workflow-diagram {
            background: white;
            padding: 30px;
            border-radius: 15px;
            margin: 30px 0;
            text-align: center;
        }
        .workflow-step {
            display: inline-block;
            padding: 20px 30px;
            background: linear-gradient(135deg, #ffe0f0 0%, #fff 100%);
            border-radius: 10px;
            margin: 10px;
            border: 2px solid #C71585;
        }
        .arrow {
            display: inline-block;
            color: #C71585;
            font-size: 2em;
            margin: 0 10px;
        }
        .genre-badge {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            background: linear-gradient(135deg, #C71585 0%, #FF1493 100%);
            color: white;
            font-size: 0.9em;
        }
        .footer {
            text-align: center;
            padding: 30px;
            margin-top: 50px;
            border-top: 3px solid #ffe0f0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="main-container">
            <!-- Hero Header -->
            <div class="hero-header">
                <h1><i class="fas fa-book-reader"></i> Digital Library Organizer</h1>
                <p class="lead mb-0">A Complete Data Structures Demonstration</p>
                <p class="mb-0">Recursion • Hash Tables • Binary Search Trees</p>
            </div>

            <?php
            // ============================================================
            // DATA STRUCTURES INITIALIZATION
            // ============================================================

            // Library structure for recursion
            $library = [
                "Fiction" => [
                    "Fantasy" => ["Harry Potter", "The Hobbit", "The Name of the Wind"],
                    "Mystery" => ["Sherlock Holmes", "Gone Girl", "The Girl with the Dragon Tattoo"],
                    "Science Fiction" => ["Dune", "1984", "The Martian"]
                ],
                "Non-Fiction" => [
                    "Science" => ["A Brief History of Time", "The Selfish Gene", "Cosmos"],
                    "Biography" => ["Steve Jobs", "Becoming", "Educated"],
                    "History" => ["Sapiens", "Guns, Germs, and Steel"]
                ],
                "Classic Literature" => [
                    "American" => ["The Great Gatsby", "To Kill a Mockingbird", "The Catcher in the Rye"],
                    "British" => ["Pride and Prejudice", "Jane Eyre", "Wuthering Heights"]
                ]
            ];

            // Hash table for book details
            $bookInfo = [
                "Harry Potter" => ["author" => "J.K. Rowling", "year" => 1997, "genre" => "Fantasy", "pages" => 223],
                "The Hobbit" => ["author" => "J.R.R. Tolkien", "year" => 1937, "genre" => "Fantasy", "pages" => 310],
                "The Name of the Wind" => ["author" => "Patrick Rothfuss", "year" => 2007, "genre" => "Fantasy", "pages" => 662],
                "Sherlock Holmes" => ["author" => "Arthur Conan Doyle", "year" => 1887, "genre" => "Mystery", "pages" => 307],
                "Gone Girl" => ["author" => "Gillian Flynn", "year" => 2012, "genre" => "Mystery", "pages" => 415],
                "The Girl with the Dragon Tattoo" => ["author" => "Stieg Larsson", "year" => 2005, "genre" => "Mystery", "pages" => 465],
                "Dune" => ["author" => "Frank Herbert", "year" => 1965, "genre" => "Science Fiction", "pages" => 688],
                "1984" => ["author" => "George Orwell", "year" => 1949, "genre" => "Science Fiction", "pages" => 328],
                "The Martian" => ["author" => "Andy Weir", "year" => 2011, "genre" => "Science Fiction", "pages" => 369],
                "A Brief History of Time" => ["author" => "Stephen Hawking", "year" => 1988, "genre" => "Science", "pages" => 256],
                "The Selfish Gene" => ["author" => "Richard Dawkins", "year" => 1976, "genre" => "Science", "pages" => 360],
                "Cosmos" => ["author" => "Carl Sagan", "year" => 1980, "genre" => "Science", "pages" => 365],
                "Steve Jobs" => ["author" => "Walter Isaacson", "year" => 2011, "genre" => "Biography", "pages" => 656],
                "Becoming" => ["author" => "Michelle Obama", "year" => 2018, "genre" => "Biography", "pages" => 448],
                "Educated" => ["author" => "Tara Westover", "year" => 2018, "genre" => "Biography", "pages" => 334],
                "Sapiens" => ["author" => "Yuval Noah Harari", "year" => 2011, "genre" => "History", "pages" => 443],
                "Guns, Germs, and Steel" => ["author" => "Jared Diamond", "year" => 1997, "genre" => "History", "pages" => 480],
                "The Great Gatsby" => ["author" => "F. Scott Fitzgerald", "year" => 1925, "genre" => "American Classic", "pages" => 180],
                "To Kill a Mockingbird" => ["author" => "Harper Lee", "year" => 1960, "genre" => "American Classic", "pages" => 324],
                "The Catcher in the Rye" => ["author" => "J.D. Salinger", "year" => 1951, "genre" => "American Classic", "pages" => 277],
                "Pride and Prejudice" => ["author" => "Jane Austen", "year" => 1813, "genre" => "British Classic", "pages" => 432],
                "Jane Eyre" => ["author" => "Charlotte Brontë", "year" => 1847, "genre" => "British Classic", "pages" => 507],
                "Wuthering Heights" => ["author" => "Emily Brontë", "year" => 1847, "genre" => "British Classic", "pages" => 464]
            ];

            // ============================================================
            // BINARY SEARCH TREE CLASSES
            // ============================================================
            
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
                private $nodeCount;
                
                public function __construct() {
                    $this->root = null;
                    $this->nodeCount = 0;
                }
                
                public function insert($data) {
                    $newNode = new Node($data);
                    if ($this->root === null) {
                        $this->root = $newNode;
                    } else {
                        $this->insertNode($this->root, $newNode);
                    }
                    $this->nodeCount++;
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
                
                public function getNodeCount() {
                    return $this->nodeCount;
                }
            }

            // Initialize BST
            $bst = new BinarySearchTree();
            foreach ($bookInfo as $title => $info) {
                $bst->insert($title);
            }

            // ============================================================
            // HELPER FUNCTIONS
            // ============================================================

            // Recursive display function
            function displayLibrary($library, $indent = 0) {
                foreach ($library as $key => $value) {
                    if (is_array($value)) {
                        $spaces = str_repeat("&nbsp;&nbsp;&nbsp;", $indent);
                        $icon = $indent == 0 ? "📁" : "📂";
                        $class = $indent == 0 ? "category" : "subcategory";
                        echo "<div class='$class'>{$spaces}{$icon} {$key}</div>";
                        displayLibrary($value, $indent + 1);
                    } else {
                        $spaces = str_repeat("&nbsp;&nbsp;&nbsp;", $indent);
                        echo "<div class='book-item' onclick='showBookDetails(\"" . addslashes($value) . "\")'>{$spaces}📖 {$value}</div>";
                    }
                }
            }

            // Get book info function
            function getBookInfo($title, $bookInfo) {
                foreach ($bookInfo as $bookTitle => $info) {
                    if (strcasecmp($bookTitle, $title) == 0) {
                        return array_merge(['title' => $bookTitle], $info);
                    }
                }
                return null;
            }

            // Count statistics
            function countItems($library, &$categories = 0, &$books = 0) {
                foreach ($library as $value) {
                    if (is_array($value)) {
                        $categories++;
                        countItems($value, $categories, $books);
                    } else {
                        $books++;
                    }
                }
            }

            $categories = 0;
            $books = 0;
            countItems($library, $categories, $books);

            // Handle search
            $selectedBook = null;
            if (isset($_POST['search_book'])) {
                $selectedBook = getBookInfo($_POST['book_title'], $bookInfo);
            }
            ?>

            <!-- Statistics Section -->
            <div class="stats-section">
                <h3 class="text-center mb-4"><i class="fas fa-chart-line"></i> Library Overview</h3>
                <div class="row">
                    <div class="col-md-3">
                        <div class="stat-box">
                            <div class="stat-number"><?php echo $categories; ?></div>
                            <div class="stat-label">Categories</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat-box">
                            <div class="stat-number"><?php echo $books; ?></div>
                            <div class="stat-label">Books</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat-box">
                            <div class="stat-number"><?php echo count($bookInfo); ?></div>
                            <div class="stat-label">Details Available</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat-box">
                            <div class="stat-number"><?php echo $bst->getNodeCount(); ?></div>
                            <div class="stat-label">BST Nodes</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Feature Cards -->
            <div class="row mb-5">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon"><i class="fas fa-folder-tree"></i></div>
                        <h3>Part I: Recursion</h3>
                        <p>Navigate hierarchical library structure using recursive functions to display categories and subcategories.</p>
                        <p><strong>Complexity:</strong> O(n)</p>
                        <a href="recursion.php" class="btn btn-custom btn-block mt-3">Explore Recursion</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon"><i class="fas fa-hashtag"></i></div>
                        <h3>Part II: Hash Table</h3>
                        <p>Store and retrieve book metadata with O(1) constant-time lookups using associative arrays.</p>
                        <p><strong>Complexity:</strong> O(1)</p>
                        <a href="hashtable.php" class="btn btn-custom btn-block mt-3">Explore Hash Tables</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon"><i class="fas fa-project-diagram"></i></div>
                        <h3>Part III: Binary Search Tree</h3>
                        <p>Organize books alphabetically with efficient insertion and searching using BST structure.</p>
                        <p><strong>Complexity:</strong> O(log n)</p>
                        <a href="bst.php" class="btn btn-custom btn-block mt-3">Explore BST</a>
                    </div>
                </div>
            </div>

            <!-- Workflow Diagram -->
            <div class="workflow-diagram">
                <h3 class="mb-4"><i class="fas fa-sitemap"></i> System Workflow</h3>
                <div>
                    <div class="workflow-step">
                        <i class="fas fa-folder-tree fa-2x" style="color: #C71585;"></i>
                        <p class="mb-0 mt-2"><strong>Browse Categories</strong></p>
                        <small>Using Recursion</small>
                    </div>
                    <span class="arrow">→</span>
                    <div class="workflow-step">
                        <i class="fas fa-mouse-pointer fa-2x" style="color: #C71585;"></i>
                        <p class="mb-0 mt-2"><strong>Select Book</strong></p>
                        <small>Click or Search</small>
                    </div>
                    <span class="arrow">→</span>
                    <div class="workflow-step">
                        <i class="fas fa-hashtag fa-2x" style="color: #C71585;"></i>
                        <p class="mb-0 mt-2"><strong>Fetch Details</strong></p>
                        <small>Using Hash Table</small>
                    </div>
                    <span class="arrow">→</span>
                    <div class="workflow-step">
                        <i class="fas fa-check-circle fa-2x" style="color: #C71585;"></i>
                        <p class="mb-0 mt-2"><strong>Verify in BST</strong></p>
                        <small>Confirm Existence</small>
                    </div>
                </div>
            </div>

            <!-- Integrated Demo Section -->
            <div class="integrated-demo">
                <h3 class="text-center mb-4"><i class="fas fa-desktop"></i> Live Integrated Demo</h3>
                
                <div class="row">
                    <!-- Left Column: Library Structure -->
                    <div class="col-md-6">
                        <h5><i class="fas fa-folder-open"></i> Library Structure (Recursion)</h5>
                        <div class="library-tree">
                            <?php displayLibrary($library); ?>
                        </div>
                    </div>

                    <!-- Right Column: Search and Details -->
                    <div class="col-md-6">
                        <h5><i class="fas fa-search"></i> Search & Details (Hash Table)</h5>
                        <div class="search-bar">
                            <form method="POST" id="searchForm">
                                <div class="form-group">
                                    <input type="text" name="book_title" id="book_title" 
                                           class="form-control form-control-lg" 
                                           placeholder="Enter book title..." 
                                           value="<?php echo isset($_POST['book_title']) ? htmlspecialchars($_POST['book_title']) : ''; ?>">
                                </div>
                                <button type="submit" name="search_book" class="btn btn-custom btn-block">
                                    <i class="fas fa-search"></i> Get Book Details
                                </button>
                            </form>
                        </div>

                        <?php if ($selectedBook): ?>
                            <div class="book-details-popup" id="bookDetails">
                                <h4><i class="fas fa-book"></i> <?php echo htmlspecialchars($selectedBook['title']); ?></h4>
                                <hr>
                                <p><strong><i class="fas fa-user"></i> Author:</strong> <?php echo htmlspecialchars($selectedBook['author']); ?></p>
                                <p><strong><i class="fas fa-calendar"></i> Year:</strong> <?php echo $selectedBook['year']; ?></p>
                                <p><strong><i class="fas fa-tag"></i> Genre:</strong> 
                                    <span class="genre-badge"><?php echo htmlspecialchars($selectedBook['genre']); ?></span>
                                </p>
                                <p><strong><i class="fas fa-file-alt"></i> Pages:</strong> <?php echo $selectedBook['pages']; ?> pages</p>
                                <hr>
                                <p class="mb-0">
                                    <strong><i class="fas fa-check-circle text-success"></i> BST Status:</strong> 
                                    <?php if ($bst->search($selectedBook['title'])): ?>
                                        <span class="text-success">✓ Found in Binary Search Tree</span>
                                    <?php else: ?>
                                        <span class="text-danger">✗ Not found in BST</span>
                                    <?php endif; ?>
                                </p>
                            </div>
                        <?php elseif (isset($_POST['search_book'])): ?>
                            <div class="alert alert-warning mt-3">
                                <i class="fas fa-exclamation-triangle"></i> Book not found in our database.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- BST Preview Section -->
            <div class="mt-5">
                <h3><i class="fas fa-sort-alpha-down"></i> All Books (Alphabetically Sorted via BST)</h3>
                <div class="bst-preview">
                    <?php
                    $sortedBooks = $bst->inorderTraversal();
                    foreach ($sortedBooks as $index => $book) {
                        echo "<div class='bst-node-preview' onclick='searchBookByClick(\"" . addslashes($book) . "\")'>";
                        echo "<i class='fas fa-chevron-right'></i> " . ($index + 1) . ". " . htmlspecialchars($book);
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>

            <!-- Key Concepts Summary -->
            <div class="mt-5">
                <div class="alert alert-info">
                    <h4><i class="fas fa-lightbulb"></i> Key Concepts Demonstrated</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Recursion</h5>
                            <ul>
                                <li>Hierarchical traversal</li>
                                <li>Base & recursive cases</li>
                                <li>Stack-based execution</li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <h5>Hash Tables</h5>
                            <ul>
                                <li>Key-value storage</li>
                                <li>O(1) lookup time</li>
                                <li>Fast data retrieval</li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <h5>Binary Search Tree</h5>
                            <ul>
                                <li>Sorted data structure</li>
                                <li>O(log n) operations</li>
                                <li>Inorder traversal</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="footer">
                <h4><i class="fas fa-graduation-cap"></i> Digital Library Organizer Project</h4>
                <p class="text-muted">A comprehensive demonstration of fundamental data structures and algorithms</p>
                <div class="mt-4">
                    <a href="recursion.php" class="btn btn-outline-primary mx-2">
                        <i class="fas fa-folder-tree"></i> Part I
                    </a>
                    <a href="hashtable.php" class="btn btn-outline-primary mx-2">
                        <i class="fas fa-hashtag"></i> Part II
                    </a>
                    <a href="bst.php" class="btn btn-outline-primary mx-2">
                        <i class="fas fa-project-diagram"></i> Part III
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Function to show book details when clicking on a book in the tree
        function showBookDetails(bookTitle) {
            document.getElementById('book_title').value = bookTitle;
            document.getElementById('searchForm').submit();
        }

        // Function to search book when clicking on BST node
        function searchBookByClick(bookTitle) {
            document.getElementById('book_title').value = bookTitle;
            document.getElementById('searchForm').submit();
        }

        // Smooth scroll to book details if they exist
        $(document).ready(function() {
            <?php if ($selectedBook): ?>
                $('html, body').animate({
                    scrollTop: $("#bookDetails").offset().top - 100
                }, 1000);
            <?php endif; ?>
        });
    </script>
</body>
</html>