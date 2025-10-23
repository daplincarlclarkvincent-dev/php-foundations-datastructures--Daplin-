<?php
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
    public function __construct() { $this->root = null; }

    public function insert($data) {
        $newNode = new Node($data);
        if ($this->root === null) $this->root = $newNode;
        else $this->insertNode($this->root, $newNode);
    }

    private function insertNode($node, $newNode) {
        if (strcasecmp($newNode->data, $node->data) < 0)
            $node->left === null ? $node->left = $newNode : $this->insertNode($node->left, $newNode);
        else
            $node->right === null ? $node->right = $newNode : $this->insertNode($node->right, $newNode);
    }

    public function search($data) {
        return $this->searchNode($this->root, $data);
    }

    private function searchNode($node, $data) {
        if ($node === null) return false;
        if (strcasecmp($data, $node->data) == 0) return true;
        elseif (strcasecmp($data, $node->data) < 0) return $this->searchNode($node->left, $data);
        else return $this->searchNode($node->right, $data);
    }

    public function inorderTraversal($node = null, $isFirst = true) {
        static $result = [];
        if ($isFirst) { $result = []; $node = $this->root; }
        if ($node !== null) {
            $this->inorderTraversal($node->left, false);
            $result[] = $node->data;
            $this->inorderTraversal($node->right, false);
        }
        return $result;
    }
}

$bst = new BinarySearchTree();
$allBooks = ["Harry Potter", "The Hobbit", "Sherlock Holmes", "Gone Girl", "A Brief History of Time", "The Selfish Gene", "Steve Jobs", "Becoming"];
foreach ($allBooks as $book) $bst->insert($book);

$searchTitles = [];
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search_bst'])) {
    $searchInput = $_POST['bst_search'];
    $searchTitles = array_map('trim', explode(',', $searchInput));
}
?>

<div class="main-container">
    <div class="section-header">
        <h3><i class="fas fa-tree"></i> Part III: Binary Search Tree</h3>
    </div>

    <div class="mb-4">
        <h5>Inorder Traversal (Alphabetical Order):</h5>
        <div class="bst-display">
            <?php
            $sortedBooks = $bst->inorderTraversal();
            foreach ($sortedBooks as $book) echo "<div><i class='fas fa-chevron-right'></i> $book</div>";
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
                        <div class="search-result"><i class="fas fa-check-circle"></i> <strong><?php echo htmlspecialchars($title); ?></strong>: Found!</div>
                    <?php else: ?>
                        <div class="not-found"><i class="fas fa-times-circle"></i> <strong><?php echo htmlspecialchars($title); ?></strong>: Not Found.</div>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
