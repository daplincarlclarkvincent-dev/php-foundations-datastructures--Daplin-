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
?>

<div class="main-container">
    <div class="section-header">
        <h3><i class="fas fa-sitemap"></i> Part I: Library Categories (Recursive Display)</h3>
    </div>
    <?php echo displayLibrary($library); ?>
</div>
