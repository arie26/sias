<?php

//----------Soap Operation
class PaymentManagerController extends CController
{
    public function actions()
    {
        Yii::log("new request", "debug");
        return array(
            'index' => array(
                //'class' => 'ext.GWebService.GSoapServerAction',
                'class' => 'CWebServiceAction',
            ),
        );
    }

    public function  actionVersion()
    {
        echo Yii::getVersion();
    }

    /**
     * @param InquiryRequest $req
     * @return InquiryResult $res
     * @soap
     */
    public function inquiry($req = null)
    {
        Yii::log('inquiry param = ' . print_r($req, true), "info");

        $response = new InquiryResponse();

        $invoiceNumber = $req->req->billKey1;
        $type = substr($invoiceNumber, 0, 1);
        $clientId = $req->req->billKey2;

        $invoice = Invoices::model()->find("invoice_number = " . $invoiceNumber);

        if ($invoice != null) {
            if ($type == "7") {
                $client = Registrants::model()->validateInvoice($clientId, $invoice);
                if ($client != null) {
                    if ($invoice->status == 0) {
                        $response->inquiryResult->billInfo1 = $client->nama_registrant;
                        $response->inquiryResult->billInfo2 = DateTime::createFromFormat("Y-m-d H:i:s", $invoice->created_on)->format("Ymd");
                        $response->inquiryResult->billInfo3 = DateTime::createFromFormat("Y-m-d", $invoice->due_date)->format("Ymd");

                        $billDetail = new BillDetail();
                        $billDetail->billName = "Registrasi UNAR";
                        $billDetail->billAmount = sprintf('%01.2f', $invoice->amount);
                        $response->inquiryResult->billDetails->push($billDetail);
                        $response->inquiryResult->status = Status::createStatusSuccess();
                    } else if ($invoice->status == -1) {
                        $response->inquiryResult->status = Status::createStatusFailed();
                        $response->inquiryResult->status->statusDescription = "Invoice is already due";
                    } else if ($invoice->status == 1) {
                        $response->inquiryResult->status = Status::createStatusInvoiceAlreadyPaid();
                    }
                } else {
                    $response->inquiryResult->status = Status::createStatusInvalidClientID();
                }
            } else if ($type == "8") {
                $client = Registrants::model()->validateInvoice($clientId,$invoice);
                if ($client != null) {
                    if ($invoice->status == 0) {
                        $response->inquiryResult->billInfo1 = $client->nama_registrant;
                        $response->inquiryResult->billInfo2 = DateTime::createFromFormat("Y-m-d H:i:s", $invoice->created_on)->format("Ymd");
                        $response->inquiryResult->billInfo3 = DateTime::createFromFormat("Y-m-d", $invoice->due_date)->format("Ymd");

                        $billDetail = new BillDetail();
                        $billDetail->billName = "Biaya Cetak IAR";
                        $billDetail->billAmount = sprintf('%01.2f', $invoice->amount);
                        $response->inquiryResult->billDetails->push($billDetail);
                        $response->inquiryResult->status = Status::createStatusSuccess();
                    } else if ($invoice->status == -1) {
                        $response->inquiryResult->status = Status::createStatusFailed();
                        $response->inquiryResult->status->statusDescription = "Invoice is already due";
                    } else if ($invoice->status == 1) {
                        $response->inquiryResult->status = Status::createStatusInvoiceAlreadyPaid();
                    }
                } else {
                    $response->inquiryResult->status = Status::createStatusInvalidClientID();
                }
            } else if ($type == "9") {
                $client = Registrants::model()->validateInvoice($clientId,$invoice);
                if ($client != null) {
                    if ($invoice->status == 0) {
                        $response->inquiryResult->billInfo1 = $client->nama_registrant;
                        $response->inquiryResult->billInfo2 = DateTime::createFromFormat("Y-m-d H:i:s", $invoice->created_on)->format("Ymd");
                        $response->inquiryResult->billInfo3 = DateTime::createFromFormat("Y-m-d", $invoice->due_date)->format("Ymd");

                        $billDetail = new BillDetail();
                        $billDetail->billName = "Biaya Proses IAR";
                        $billDetail->billAmount = sprintf('%01.2f', $invoice->amount);
                        $response->inquiryResult->billDetails->push($billDetail);
                        $response->inquiryResult->status = Status::createStatusSuccess();
                    } else if ($invoice->status == -1) {
                        $response->inquiryResult->status = Status::createStatusFailed();
                        $response->inquiryResult->status->statusDescription = "Invoice is already due";
                    } else if ($invoice->status == 1) {
                        $response->inquiryResult->status = Status::createStatusInvoiceAlreadyPaid();
                    }
                } else {
                    $response->inquiryResult->status = Status::createStatusInvalidClientID();
                }
            } else {
                $response->inquiryResult->status = Status::createStatusInvalidInvoiceID();
            }
        } else {
            $response->inquiryResult->status = Status::createStatusInvalidInvoiceID();
        }

        Yii::log('inquiry response = ' . print_r($response, true), "info");

        return $response;
    }

    /**
     * @param PaymentRequest $req
     * @return PaymentResult $res
     * @soap
     */
    public function payment($req = null)
    {
        $response = new PaymentResponse();
        $transactionId = $req->req->transactionID;

        Yii::log('payment ID ' . $transactionId . ', param = ' . print_r($req, true), "info");

        $invoiceNumber = $req->req->billKey1;
        $clientId = $req->req->billKey2;
        $type = substr($invoiceNumber, 0, 1);
        $paidBill = $req->req->paidBills->strings->item;
        $amount = $req->req->paymentAmount;

        $paymentConfig = Yii::app()->config->get('payment');

        $invoice = Invoices::model()->find("invoice_number = " . $invoiceNumber);
        if ($invoice != null) {
            if ($type == "7") {
                $client = Registrants::model()->validateInvoice($clientId,$invoice);
                if ($client != null) {
                    if ($invoice->status == 0) {
                        if (sprintf('%01.2f', $invoice->amount) == $amount) {
                            $response->paymentResult->billInfo1 = $client->nama_registrant;
                            $response->paymentResult->billInfo2 = DateTime::createFromFormat("Y-m-d H:i:s", $invoice->created_on)->format("Ymd");
                            $response->paymentResult->billInfo3 = DateTime::createFromFormat("Y-m-d", $invoice->due_date)->format("Ymd");

                            Yii::app()->cache->set(
                                "transaction_" . $transactionId,
                                true, 60 * $paymentConfig['minutes_allow_reversal']);

                            if ($invoice->doPay()) {
                                $response->paymentResult->status = Status::createStatusSuccess();
                            } else {
                                $response->paymentResult->status = Status::createStatusFailed("DB Error");
                            }
                        } else {
                            $response->paymentResult->status = Status::createStatusInvalidAmount();
                        }
                    } else if ($invoice->status == -1) {
                        $response->paymentResult->status = Status::createStatusFailed();
                        $response->paymentResult->status->statusDescription = "Invoice is already due";
                    } else if ($invoice->status == 1) {
                        $response->paymentResult->status = Status::createStatusInvoiceAlreadyPaid();
                    }
                } else {
                    $response->paymentResult->status = Status::createStatusInvalidClientID();
                }
            } else if ($type == "8") {
                $client = Registrants::model()->validateInvoice($clientId,$invoice);
                if ($client != null) {
                    if ($invoice->status == 0) {
                        if (sprintf('%01.2f', $invoice->amount) == $amount) {
                            $response->paymentResult->billInfo1 = $client->nama_registrant;
                            $response->paymentResult->billInfo2 = DateTime::createFromFormat("Y-m-d H:i:s", $invoice->created_on)->format("Ymd");
                            $response->paymentResult->billInfo3 = DateTime::createFromFormat("Y-m-d", $invoice->due_date)->format("Ymd");

                            Yii::app()->cache->set(
                                "transaction_" . $transactionId,
                                true, 60 * $paymentConfig['minutes_allow_reversal']);

                            if ($invoice->doPay()) {
                                $response->paymentResult->status = Status::createStatusSuccess();
                            } else {
                                $response->paymentResult->status = Status::createStatusFailed("DB Error");
                            }
                        } else {
                            $response->paymentResult->status = Status::createStatusInvalidAmount();
                        }
                    } else if ($invoice->status == -1) {
                        $response->paymentResult->status = Status::createStatusFailed();
                        $response->paymentResult->status->statusDescription = "Invoice is already due";
                    } else if ($invoice->status == 1) {
                        $response->paymentResult->status = Status::createStatusInvoiceAlreadyPaid();
                    }
                } else {
                    $response->paymentResult->status = Status::createStatusInvalidClientID();
                }
            } else if ($type == "9") {
                $client = Registrants::model()->validateInvoice($clientId,$invoice);
                if ($client != null) {
                    if ($invoice->status == 0) {
                        if (sprintf('%01.2f', $invoice->amount) == $amount) {
                            $response->paymentResult->billInfo1 = $client->nama_registrant;
                            $response->paymentResult->billInfo2 = DateTime::createFromFormat("Y-m-d H:i:s", $invoice->created_on)->format("Ymd");
                            $response->paymentResult->billInfo3 = DateTime::createFromFormat("Y-m-d", $invoice->due_date)->format("Ymd");

                            Yii::app()->cache->set(
                                "transaction_" . $transactionId,
                                true, 60 * $paymentConfig['minutes_allow_reversal']);

                            if ($invoice->doPay()) {
                                $response->paymentResult->status = Status::createStatusSuccess();
                            } else {
                                $response->paymentResult->status = Status::createStatusFailed("DB Error");
                            }
                        } else {
                            $response->paymentResult->status = Status::createStatusInvalidAmount();
                        }
                    } else if ($invoice->status == -1) {
                        $response->paymentResult->status = Status::createStatusFailed();
                        $response->paymentResult->status->statusDescription = "Invoice is already due";
                    } else if ($invoice->status == 1) {
                        $response->paymentResult->status = Status::createStatusInvoiceAlreadyPaid();
                    }
                } else  {
                    $response->paymentResult->status = Status::createStatusInvalidClientID();
                }
            } else {
                $response->inquiryResult->status = Status::createStatusInvalidInvoiceID();
            }
        } else {
            $response->paymentResult->status = Status::createStatusInvalidInvoiceID();
        }

        Yii::log('payment ID ' . $transactionId . ', response = ' . print_r($req, true), "debug");

        return $response;
    }

    /**
     * @param ReversalRequest $req
     * @return ReversalResult $res
     * @soap
     */
    public function reversal($req = null)
    {
        $transactionId = $req->req->transactionID;

        $response = new ReversalResponse();

        $invoiceNumber = $req->req->billKey1;
        $type = substr($invoiceNumber, 0, 1);
        $clientId = $req->req->billKey2;
        $amount = $req->req->paymentAmount;

        Yii::log('reversal ID ' . $transactionId . ', param = ' . print_r($req, true), "info");

        $invoice = Invoices::model()->find("invoice_number = " . $invoiceNumber);
        if ($invoice != null) {
            if ($invoice->status == 1) {
                if (sprintf('%01.2f', $invoice->amount) == $amount) {
                    if (($type == "7") || ($type == "8") || ($type == "9")){
                        $client = Registrants::model()->validateInvoice($clientId,$invoice);
                    }
                    if ($client != null) {
                        $transactionCache = Yii::app()->cache->get("transaction_" . $transactionId);
                        if (isset($transactionCache)) {

                            if ($invoice->doReversal()) {
                                $response->reversalResult->status = Status::createStatusSuccess();
                            } else {
                                $response->reversalResult->status = Status::createStatusFailed("DB Error");
                            }
                        } else {
                            $response->reversalResult->status = Status::createStatusInvalidReversal();
                        }
                    } else {
                        $response->reversalResult->status = Status::createStatusInvalidClientID();
                    }
                } else {
                    $response->reversalResult->status = Status::createStatusInvalidAmount();
                }
            } else if ($invoice->status == -1) {
                $response->reversalResult->status = Status::createStatusFailed();
                $response->reversalResult->status->statusDescription = "Invoice is already due";
            } else if ($invoice->status == 0) {
                $response->reversalResult->status = Status::createStatusInvalidReversal();
            }
        } else {
            $response->reversalResult->status = Status::createStatusInvalidInvoiceID();
        }

        Yii::log('payment ID ' . $transactionId . ', response = ' . print_r($req, true), "debug");

        return $response;
    }
}

?>
