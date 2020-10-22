<?php
namespace Resultify\SimpleShop\Controller;

use Resultify\SimpleShop\Domain\Repository\ProductRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class SimpleShopController extends ActionController
{
    const SESSION_KEY = 'simpleshop_cart';

    private $productRepository;
    /**
     * inject the product repository
     * 
     * @param \Resultify\SimpleShop\Domain\Repository $productRepository
     */
    public function injectProductRepository(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }


    public function listAction()
    {
        $products = $this->productRepository->findAll();
        $this->view->assign('products', $products);
    }

    public function showAction(int $uid)
    {
        $product = $this->productRepository->findByUid($uid);
        $this->view->assign('product', $product);
    }

    public function buyAction(int $uid)
    {
        $product = $this->productRepository->findByUid($uid);
        $this->view->assign('product', $product);
        
        $cart = $GLOBALS['TSFE']->fe_user->getKey('ses', self::SESSION_KEY);
        if (!is_array($cart)) {
            $cart = [];
        }
        
        $count = 1;
        if(array_key_exists($uid, $cart)) {
            $count = $cart[$uid] + $count;
        }
        $cart[$uid] = $count;
        
        $GLOBALS['TSFE']->fe_user->setKey('ses', self::SESSION_KEY, $cart);
        $GLOBALS['TSFE']->fe_user->storeSessionData();
        $this->redirect('show', 'SimpleShop', NULL, ['uid' => $uid]);
    }

    public function cartAction()
    {
        
        $cart = $GLOBALS['TSFE']->fe_user->getKey('ses', self::SESSION_KEY) ?? [];
        // var_dump($cart); die;
        $items = [];
        if ($cart) {
            $products = $this->productRepository->getByUids(array_keys($cart))->toArray();
            foreach($products as $product) {
                $items[] = [
                    'product' => $product,
                    'count' => $cart[$product->getUid()]
                ];
            }
        }
        $this->view->assign('items', $items);
    }

    public function removeFromCartAction(int $uid)
    {
        $cart = $GLOBALS['TSFE']->fe_user->getKey('ses', self::SESSION_KEY);
        unset($cart[$uid]);
        $GLOBALS['TSFE']->fe_user->setKey('ses', self::SESSION_KEY, $cart);
        $GLOBALS['TSFE']->fe_user->storeSessionData();
        $this->redirect('cart', 'SimpleShop', NULL, []);
    }


}