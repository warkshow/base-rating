<li>
    <a href="?id=<?= $id ?>"><?= $category['title']; ?></a>
    <?php if (isset($category['childs'])) : ?>
        <ul>
            <?php $this->getMenuHtml($category['childs']); ?>
        </ul>
    <?php endif; ?>
</li>