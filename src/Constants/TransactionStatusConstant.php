<?php

namespace Crenata\AffiliateConnector\Constants;

class TransactionStatusConstant {
    /**
     * Customer create transaction.
     */
    const PENDING = 1;

    /**
     * Customer cancel transaction.
     */
    const CANCEL = 2;

    /**
     * Transaction is not available, due no activity between period.
     */
    const EXPIRE = 3;

    /**
     * Unexpected error occurred during transaction processing.
     */
    const FAILURE = 4;

    /**
     * Payment need revision, used for manual payment.
     * - Payment proof invalid.
     */
    const NEED_REVISION = 5;

    /**
     * Payment rejected :
     * - Not received.
     * - Credentials invalid.
     * - Fraud detection.
     */
    const DENY = 6;

    /**
     * Authorize the payment card, this status for payment card only.
     */
    const AUTHORIZE = 7;

    /**
     * The transaction is successful and the card balance is captured successfully.
     */
    const CAPTURE = 8;

    /**
     * The transaction is successfully settled, funds have been credited to your account.
     */
    const SETTLEMENT = 9;

    /**
     * The transaction is marked to be partially refunded.
     */
    const PARTIAL_REFUND = 10;

    /**
     * The transaction is marked to be fully refunded.
     */
    const REFUND = 11;

    /**
     * The transaction is marked to be partially charged back.
     */
    const PARTIAL_CHARGE_BACK = 12;

    /**
     * The transaction is marked to be fully charged back.
     */
    const CHARGE_BACK = 13;
}