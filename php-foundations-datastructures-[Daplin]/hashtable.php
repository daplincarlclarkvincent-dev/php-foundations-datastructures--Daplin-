<?php
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

$allBooks = array_keys($bookInfo);
$searchBookTitle = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search_book'])) {
    $searchBookTitle = $_POST['book_title'];
}

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
?>

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
