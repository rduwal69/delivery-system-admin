<?php

namespace App\Controller;

use App\Entity\OrderProduct;
use App\Entity\Shop;
use App\Entity\ShopOrder;
use App\Form\OrderProductType;
use App\Form\ShopOrderType;
use App\Repository\ShopOrderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShopOrderController extends AbstractController
{
    /**
     * @Route("/shop/{shop}/order", name="shop_order_index", methods={"GET"})
     */
    public function index(ShopOrderRepository $shopOrderRepository,
                          Shop $shop): Response
    {
        $shopOrders = $this->getDoctrine()
            ->getRepository(ShopOrder::class)
            ->findBy(['shop' => $shop->getId()]);

        return $this->render('shop_order/index.html.twig', [
            'shop_orders' => $shopOrders,
            'shop' => $shop
        ]);
    }

    /**
     * @Route("/shop/{shop}/order/new", name="shop_order_new", methods={"GET","POST"})
     */
    public function new(Request $request,
                        Shop $shop): Response
    {
        $shopOrder = new ShopOrder();
        $shopOrder->setShop($shop);
        $shopOrder->setDateOfOrder(new \DateTime('now'));


        $form = $this->createForm(ShopOrderType::class, $shopOrder);
        $data = $request->request->all();

        if ($request->isMethod('POST')) {
            $shopOrderData = [
                'orderNumber' => $data['orderNumber'],
                'deliveryAddress' => $data['deliveryAddress'],
                'total' => $data['total'],
                'discount' => $data['discount'],
                'grandTotal' => $data['grandTotal']
            ];

            $form->submit($shopOrderData);
//            $form->submit($data);
//            print "<pre>";
//            print_r($data);
//            exit();
            if ($form->isSubmitted() && $form->isValid()) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($shopOrder);

                foreach ($data['product'] as $products){
//                    print_r($products);
                    $orderProduct = new OrderProduct();

                    $orderProduct->setProductName($products['name']);
                    $orderProduct->setProductPrice($products['price']);
                    $orderProduct->setProductQuantity($products['quantity']);
                    $orderProduct->setShopOrder($shopOrder);

                    $entityManager->persist($orderProduct);
                }
//                print "<pre>";
//                print_r($data['product'][0]['name']);
//                exit;

                $entityManager->flush();
                $this->addFlash(
                    'info',
                    'Order Added'
                );

                return $this->redirectToRoute('shop_order_index', [
                    'shop' => $shop->getId(),
                    'shopOrder' => $shopOrder->getId()
                ]);
            } else {
                $form->getErrors();
                foreach ($form->getErrors() as $error) {
                    print_r($error->getMessage());
                }
                exit();
            }
        }

        return $this->render('shop_order/new.html.twig', [
            'shop_order' => $shopOrder,
            'form' => $form->createView(),
            'shop' => $shop
        ]);
    }

    /**
     * @Route("/shop/{shop}/order/{shopOrder}", name="shop_order_show", methods={"GET"})
     */
    public function show(Shop $shop,
                         ShopOrder $shopOrder): Response
    {
        return $this->render('shop_order/show.html.twig', [
            'shop_order' => $shopOrder,
            'shop' => $shop
        ]);
    }

    /**
     * @Route("/shop/{shop}/order/{shopOrder}/edit", name="shop_order_edit", methods={"GET","POST"})
     */
    public function edit(Request $request,
                         ShopOrder $shopOrder,
                         Shop $shop): Response
    {
        $form = $this->createForm(ShopOrderType::class, $shopOrder);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('shop_order_index', [
                'id' => $shopOrder->getId(),
                'shop' => $shop->getId()
            ]);
        }

        return $this->render('shop_order/edit.html.twig', [
            'shop_order' => $shopOrder,
            'form' => $form->createView(),
            'shop' => $shop
        ]);
    }

    /**
     * @Route("/shop/{shop}/order/{order}", name="shop_order_delete", methods={"DELETE"})
     */
    public function delete(Request $request,
                           Shop $shop,
                           ShopOrder $shopOrder): Response
    {
        if ($this->isCsrfTokenValid('delete' . $shopOrder->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($shopOrder);
            $entityManager->flush();
        }

        return $this->redirectToRoute('shop_order_index', [
            'shop' => $shopOrder->getShop()->getId()
        ]);
    }
}
