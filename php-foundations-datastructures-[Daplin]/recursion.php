<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recursive Library Display</title>
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
        .library-display {
            background: #f5f5f5;
            padding: 25px;
            border-radius: 10px;
            font-family: 'Courier New', monospace;
            margin-bottom: 30px;
            box-shadow: inset 0 2px 10px rgba(0,0,0,0.1);
            line-height: 1.8;
        }
        .category {
            color: #C71585;
            font-weight: bold;
            font-size: 1.1em;
            margin: 8px 0;
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
        .stats-card {
            background: linear-gradient(135deg, #f5f5f5 0%, #ffffff 100%);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            border-left: 4px solid #C71585;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
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
                <h1><i class="fas fa-folder-tree"></i> Part I: Recursive Directory Display</h1>
                <p class="mb-0">Hierarchical Library Organization</p>
            </div>

            <div class="description">
                <h5><i class="fas fa-info-circle"></i> About This Module</h5>
                <p><strong>Purpose:</strong> Demonstrate recursive traversal of nested data structures representing library categories and books.</p>
                <p><strong>Concept:</strong> Recursion allows elegant navigation through hierarchical structures by calling the function on each nested level.</p>
                <p class="mb-0"><strong>Key Feature:</strong> Visual indentation shows the depth of each category and subcategory in the library structure.</p>
            </div>

            <?php
            // Library structure
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

            /**
             * Recursively displays library structure with hierarchical indentation
             * 
             * @param array $library The nested array representing the library structure
             * @param int $indent The current indentation level
             * @param string $type The type of item (category/subcategory/book)
             */
            function displayLibrary($library, $indent = 0, $type = 'category') {
                foreach ($library as $key => $value) {
                    if (is_array($value)) {
                        // It's a category or subcategory
                        $spaces = str_repeat("&nbsp;&nbsp;&nbsp;", $indent);
                        $icon = $indent == 0 ? "📁" : "📂";
                        $class = $indent == 0 ? "category" : "subcategory";
                        
                        echo "<div class='$class'>{$spaces}{$icon} {$key}</div>";
                        
                        // Recursive call for nested items
                        displayLibrary($value, $indent + 1, 'subcategory');
                    } else {
                        // It's a book (leaf node)
                        $spaces = str_repeat("&nbsp;&nbsp;&nbsp;", $indent);
                        echo "<div class='book-item' data-book='{$value}'>{$spaces}📖 {$value}</div>";
                    }
                }
            }

            /**
             * Count total items in library
             */
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
            ?>

            <!-- Statistics -->
            <div class="stats-card">
                <h5><i class="fas fa-chart-bar"></i> Library Statistics</h5>
                <div class="row">
                    <div class="col-md-4">
                        <strong>Total Categories:</strong> <?php echo $categories; ?>
                    </div>
                    <div class="col-md-4">
                        <strong>Total Books:</strong> <?php echo $books; ?>
                    </div>
                    <div class="col-md-4">
                        <strong>Max Depth:</strong> 3 levels
                    </div>
                </div>
            </div>

            <!-- Library Display -->
            <div class="library-display">
                <h5 style="color: #C71585; margin-bottom: 20px;"><i class="fas fa-book-open"></i> Library Structure</h5>
                <?php displayLibrary($library); ?>
            </div>

            <!-- Code Explanation -->
            <div class="code-box">
                <h5 style="color: #81c784;"><i class="fas fa-code"></i> Recursion Key Concepts:</h5>
                <p style="color: #aed581;">
                <strong>1. Base Case:</strong> When we reach a book (string), we stop recursing<br>
                <strong>2. Recursive Case:</strong> When we find an array, we call displayLibrary() again<br>
                <strong>3. Indentation:</strong> Each recursive level increases indent by 1<br>
                <strong>4. Stack Depth:</strong> Function calls stack up until base case is reached<br>
                <strong>5. Time Complexity:</strong> O(n) where n is total items (visits each item once)
                </p>
            </div>

            <div class="text-center mt-5">
                <a href="main.php" class="btn btn-custom"><i class="fas fa-home"></i> Back to Main</a>
                <a href="hashtable.php" class="btn btn-custom"><i class="fas fa-arrow-right"></i> Next: Hash Table</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.book-item').click(function() {
                var bookTitle = $(this).data('book');
                window.location.href = 'hashtable.php?search=' + encodeURIComponent(bookTitle);
            });
        });
    </script>
</body>
</html>