<?php
namespace Resultify\SimpleShop\Controller;

use Resultify\SimpleShop\Domain\Repository\ProductRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class ProductController extends ActionController
{
    const SESSION_KEY = 'simpleshop_cart';
    
    /**
     * @var \Resultify\SimpleShop\Domain\Repository $productRepository
     */
    protected $productRepository;
    
    /**
     * inject the product repository
     * 
     * @param \Resultify\SimpleShop\Domain\Repository $productRepository
     */
    public function injectProductRepository(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @param \Resultify\SimpleShop\Domain\Model\Product $product
     */
    public function editAction(\Resultify\SimpleShop\Domain\Model\Product $product)
    {
        // $product = $this->productRepository->findByUid($uid);
        $this->view->assign('product', $product);
    }

    /**
     * @param \Resultify\SimpleShop\Domain\Model\Product $product
     */
    public function updateAction(\Resultify\SimpleShop\Domain\Model\Product $product)
    {
        $args = $this->request->getArguments();
        // var_dump($product);
        // $product->setName($args['product']);
        $this->productRepository->update($product);
        
        $persistenceManager = $this->objectManager->get("TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PersistenceManager");
        $persistenceManager->persistAll();

        $this->redirect('edit', 'Product', NULL, ['product' => $product]);
    }
}