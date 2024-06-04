<?php

namespace App\Controller;

use App\Entity\ShopOrder;
use App\Entity\OrderProduct;
use App\Entity\Shop;
use App\Form\OrderProductType;
use App\Repository\OrderProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrderProductController extends AbstractController
{
    /**
     * @Route("shop/{shop}/order/{shopOrder}/product/", name="order_product_index", methods={"GET"})
     */
    public function index(Shop $shop,
                          ShopOrder $shopOrder): Response
    {
        $orderProducts = $shopOrder->getOrderProducts();

        return $this->render('order_product/index.html.twig', [
            'shop' => $shop,
            'shop_order' => $shopOrder,
            'order_products' => $orderProducts
        ]);
    }

    /**
     * @Route("shop/{shop}/order/{shopOrder}/product/new", name="order_product_new", methods={"GET","POST"})
     */
    public function new(Request $request,
                        Shop $shop,
                        ShopOrder $shopOrder): Response
    {
        $orderProduct = new OrderProduct();
        $orderProduct->setShopOrder($shopOrder);
        $form = $this->createForm(OrderProductType::class, $orderProduct);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($orderProduct);
            $entityManager->flush();

            return $this->redirectToRoute('order_product_index', [
                'shop' => $shop->getId(),
                'shopOrder' => $shopOrder->getId()
            ]);
        }

        return $this->render('order_product/new.html.twig', [
            'order_product' => $orderProduct,
            'form' => $form->createView(),
            'shop' => $shop,
            'shop_order' => $shopOrder
        ]);
    }

    /**
     * @Route("shop/{shop}/order/{shopOrder}/product/{orderProduct}", name="order_product_show", methods={"GET"})
     */
    public function show(Shop $shop,
                         ShopOrder $shopOrder,
                         OrderProduct $orderProduct): Response
    {
        return $this->render('order_product/show.html.twig', [
            'order_product' => $orderProduct,
            'shop' => $shop,
            'shop_order' => $shopOrder
        ]);
    }

    /**
     * @Route("shop/{shop}/order/{shopOrder}/product/{orderProduct}/edit", name="order_product_edit", methods={"GET","POST"})
     */
    public function edit(Request $request,
                         Shop $shop,
                         ShopOrder $shopOrder,
                         OrderProduct $orderProduct): Response
    {
        $form = $this->createForm(OrderProductType::class, $orderProduct);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('order_product_index', [
                'id' => $orderProduct->getId(),
                'shop' => $shop->getId(),
                'shopOrder' => $shopOrder->getId()
            ]);
        }

        return $this->render('order_product/edit.html.twig', [
            'order_product' => $orderProduct,
            'shop' => $shop,
            'shop_order' => $shopOrder,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("shop/{shop}/order/{shopOrder}/product/{orderProduct}", name="order_product_delete", methods={"DELETE"})
     */
    public function delete(Request $request,
                           Shop $shop,
                           ShopOrder $shopOrder,
                           OrderProduct $orderProduct): Response
    {
        if ($this->isCsrfTokenValid('delete' . $orderProduct->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($orderProduct);
            $entityManager->flush();
        }

        return $this->redirectToRoute('order_product_index', [
            'shop' => $shop->getId(),
            'shopOrder' => $shopOrder->getId()
        ]);
    }
}
