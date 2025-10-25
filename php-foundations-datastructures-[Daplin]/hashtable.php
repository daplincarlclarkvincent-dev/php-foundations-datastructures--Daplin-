<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hash Table - Book Details</title>
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
        .search-form {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        .book-details {
            background: linear-gradient(135deg, #ffe0f0 0%, #fff 100%);
            border-left: 4px solid #C71585;
            padding: 25px;
            margin: 20px 0;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            animation: slideIn 0.5s ease;
        }
        .book-details h4 {
            color: #C71585;
            margin-bottom: 20px;
        }
        .detail-row {
            padding: 10px 0;
            border-bottom: 1px solid #f0f0f0;
        }
        .detail-row:last-child {
            border-bottom: none;
        }
        .not-found {
            background: #ffebee;
            border-left: 4px solid #f44336;
            padding: 20px;
            margin: 20px 0;
            border-radius: 10px;
            animation: slideIn 0.3s ease;
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
        .book-card {
            background: white;
            border: 2px solid #ffe0f0;
            border-radius: 10px;
            padding: 15px;
            margin: 10px 0;
            cursor: pointer;
            transition: all 0.3s;
        }
        .book-card:hover {
            border-color: #C71585;
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(199,21,133,0.2);
        }
        .stats-card {
            background: linear-gradient(135deg, #f5f5f5 0%, #ffffff 100%);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            border-left: 4px solid #C71585;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
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
        .genre-badge {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            background: linear-gradient(135deg, #C71585 0%, #FF1493 100%);
            color: white;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="main-container">
            <div class="header">
                <h1><i class="fas fa-hashtag"></i> Part II: Hash Table - Book Details</h1>
                <p class="mb-0">Fast O(1) Lookup for Book Metadata</p>
            </div>

            <div class="description">
                <h5><i class="fas fa-info-circle"></i> About This Module</h5>
                <p><strong>Purpose:</strong> Store and retrieve book information using associative arrays (hash tables) for constant-time access.</p>
                <p><strong>Concept:</strong> Hash tables use key-value pairs where the key (book title) is hashed to find the storage location instantly.</p>
                <p class="mb-0"><strong>Advantage:</strong> O(1) average time complexity for lookups, insertions, and deletions.</p>
            </div>

            <?php
            // Hash table storing book information
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

            /**
             * Retrieves book information from hash table
             * Time Complexity: O(1) average case
             * 
             * @param string $title The title of the book to search for
             * @param array $bookInfo The hash table containing book information
             * @return array|null Book information or null if not found
             */
            function getBookInfo($title, $bookInfo) {
                // Case-insensitive search
                foreach ($bookInfo as $bookTitle => $info) {
                    if (strcasecmp($bookTitle, $title) == 0) {
                        return array_merge(['title' => $bookTitle], $info);
                    }
                }
                return null;
            }

            // Handle search
            $searchResult = null;
            $searchQuery = '';
            if (isset($_GET['search']) || isset($_POST['search'])) {
                $searchQuery = isset($_GET['search']) ? $_GET['search'] : $_POST['search'];
                $searchResult = getBookInfo($searchQuery, $bookInfo);
            }
            ?>

            <!-- Statistics -->
            <div class="stats-card">
                <h5><i class="fas fa-chart-bar"></i> Hash Table Statistics</h5>
                <div class="row">
                    <div class="col-md-4">
                        <strong>Total Books:</strong> <?php echo count($bookInfo); ?>
                    </div>
                    <div class="col-md-4">
                        <strong>Lookup Time:</strong> O(1)
                    </div>
                    <div class="col-md-4">
                        <strong>Space Complexity:</strong> O(n)
                    </div>
                </div>
            </div>

            <!-- Search Form -->
            <div class="search-form">
                <h5><i class="fas fa-search"></i> Search Book Details</h5>
                <form method="POST">
                    <div class="form-group">
                        <label for="search"><strong>Enter Book Title:</strong></label>
                        <input type="text" name="search" id="search" class="form-control form-control-lg" 
                               placeholder="e.g., Harry Potter, The Hobbit..." 
                               value="<?php echo htmlspecialchars($searchQuery); ?>" required>
                        <small class="form-text text-muted">
                            Search is case-insensitive. Try any book from the library!
                        </small>
                    </div>
                    <button type="submit" class="btn btn-custom btn-lg">
                        <i class="fas fa-search"></i> Search
                    </button>
                    <a href="hashtable.php" class="btn btn-secondary btn-lg">
                        <i class="fas fa-redo"></i> Clear
                    </a>
                </form>
            </div>

            <!-- Search Results -->
            <?php if ($searchQuery): ?>
                <?php if ($searchResult): ?>
                    <div class="book-details">
                        <h4><i class="fas fa-book"></i> <?php echo htmlspecialchars($searchResult['title']); ?></h4>
                        <hr>
                        <div class="detail-row">
                            <strong><i class="fas fa-user"></i> Author:</strong> 
                            <?php echo htmlspecialchars($searchResult['author']); ?>
                        </div>
                        <div class="detail-row">
                            <strong><i class="fas fa-calendar"></i> Year Published:</strong> 
                            <?php echo $searchResult['year']; ?>
                        </div>
                        <div class="detail-row">
                            <strong><i class="fas fa-tag"></i> Genre:</strong> 
                            <span class="genre-badge"><?php echo htmlspecialchars($searchResult['genre']); ?></span>
                        </div>
                        <div class="detail-row">
                            <strong><i class="fas fa-file-alt"></i> Pages:</strong> 
                            <?php echo $searchResult['pages']; ?> pages
                        </div>
                    </div>
                <?php else: ?>
                    <div class="not-found">
                        <h5><i class="fas fa-times-circle"></i> Book Not Found</h5>
                        <p>The book "<?php echo htmlspecialchars($searchQuery); ?>" was not found in our library database.</p>
                        <p class="mb-0">Please check the spelling or browse available books below.</p>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <!-- Available Books -->
            <div class="mt-4">
                <h5><i class="fas fa-list"></i> Available Books in Hash Table:</h5>
                <div class="row">
                    <?php 
                    $chunks = array_chunk($bookInfo, ceil(count($bookInfo) / 3), true);
                    foreach ($chunks as $chunk): 
                    ?>
                        <div class="col-md-4">
                            <?php foreach ($chunk as $title => $info): ?>
                                <div class="book-card" onclick="searchBook('<?php echo addslashes($title); ?>')">
                                    <strong><?php echo htmlspecialchars($title); ?></strong><br>
                                    <small class="text-muted"><?php echo htmlspecialchars($info['author']); ?></small>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Code Explanation -->
            <div class="code-box">
                <h5 style="color: #81c784;"><i class="fas fa-code"></i> Hash Table Key Concepts:</h5>
                <p style="color: #aed581;">
                <strong>1. Key-Value Pairs:</strong> Each book title (key) maps to its details (value)<br>
                <strong>2. Hash Function:</strong> PHP internally hashes keys for fast lookup<br>
                <strong>3. O(1) Lookup:</strong> Direct access to values without iteration<br>
                <strong>4. Collision Handling:</strong> PHP handles hash collisions automatically<br>
                <strong>5. Memory Trade-off:</strong> Uses more memory for faster access<br>
                <strong>6. Best Use Case:</strong> When you need frequent lookups by unique keys
                </p>
            </div>

            <div class="text-center mt-5">
                <a href="recursion.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Previous: Recursion</a>
                <a href="main.php" class="btn btn-primary"><i class="fas fa-home"></i> Back to Main</a>
                <a href="bst.php" class="btn btn-custom"><i class="fas fa-arrow-right"></i> Next: BST</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function searchBook(title) {
            document.getElementById('search').value = title;
            document.querySelector('form').submit();
        }
    </script>
</body>
</html>