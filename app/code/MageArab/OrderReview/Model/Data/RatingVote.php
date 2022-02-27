<?php
/*
 * Copyright (c) Shaymaa Saied  21/05/2021, 09:39.
 */

namespace MageArab\OrderReview\Model\Data;
use Magento\Framework\Api\AbstractSimpleObject;

class RatingVote extends AbstractSimpleObject implements \MageArab\OrderReview\Api\Data\RatingVoteInterface
{
    /**
     * @inheritDoc
     */
    public function getRatingId()
    {
        // TODO: Implement getRatingId() method.
        return $this->_get(self::KEY_RATING_ID);
    }

    /**
     * @inheritDoc
     */
    public function getVoteId()
    {
        // TODO: Implement getVoteId() method.
        return $this->_get(self::KEY_VOTE_ID);
    }

    /**
     * @inheritDoc
     */
    public function getEntityId()
    {
        // TODO: Implement getEntityId() method.
        return $this->_get(self::ENTITY_ID);
    }

    /**
     * @inheritDoc
     */
    public function getPercent()
    {
        // TODO: Implement getPercent() method.
        return $this->_get(self::KEY_PERCENT);
    }

    /**
     * @inheritDoc
     */
    public function getRatingName()
    {
        // TODO: Implement getRatingName() method.
        return $this->_get(self::KEY_RATING_NAME);
    }

    /**
     * @inheritDoc
     */
    public function getRatingCode()
    {
        // TODO: Implement getRatingCode() method.
        return $this->_get(self::KEY_RATING_CODE);
    }

    /**
     * @inheritDoc
     */
    public function getValue()
    {
        // TODO: Implement getValue() method.
        return $this->_get(self::KEY_VALUE);
    }

    /**
     * @inheritDoc
     */
    public function setVoteId($id)
    {
        // TODO: Implement setVoteId() method.
        return $this->setData(self::KEY_VOTE_ID, $id);
    }

    /**
     * @inheritDoc
     */
    public function setRatingId($ratingId)
    {
        // TODO: Implement setRatingId() method.
        return $this->setData(self::KEY_RATING_ID, $ratingId);
    }

    /**
     * @inheritDoc
     */
    public function setPercent($percent)
    {
        // TODO: Implement setPercent() method.
        return $this->setData(self::KEY_PERCENT, $percent);
    }

    /**
     * @inheritDoc
     */
    public function setRatingName($ratingName)
    {
        // TODO: Implement setRatingName() method.
        return $this->setData(self::KEY_RATING_NAME, $ratingName);
    }

    public function setRatingCode($ratingCode)
    {
        // TODO: Implement setRatingCode() method.
        return $this->setData(self::KEY_RATING_CODE, $ratingCode);
    }

    /**
     * @inheritDoc
     */
    public function setValue($value)
    {
        // TODO: Implement setValue() method.
        return $this->setData(self::KEY_VALUE, $value);
    }

    /**
     * @inheritDoc
     */
    public function setEntityId($entityId)
    {
        // TODO: Implement setEntityId() method.
        return $this->setData(self::ENTITY_ID, $entityId);
    }
}