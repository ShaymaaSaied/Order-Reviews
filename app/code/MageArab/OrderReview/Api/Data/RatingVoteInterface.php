<?php
/*
 * Copyright (c) Shaymaa Saied  21/05/2021, 08:59.
 */

namespace MageArab\OrderReview\Api\Data;


interface RatingVoteInterface
{
    const KEY_VOTE_ID                       =   'vote_id';
    const KEY_RATING_ID                     =   'rating_id';
    const ENTITY_ID                         =   'entity_id';
    const KEY_VALUE                         =   'value';
    const KEY_PERCENT                       =   'percent';
    const KEY_RATING_NAME                   =   'rating_name';
    const KEY_RATING_CODE                   =   'rating_code';

    /**
     * Get rating vote id.
     *
     * @return int
     */
    public function getVoteId();

    /**
     * Get rating entity id.
     *
     * @return int
     */
    public function getEntityId();

    /**
     * Get rating id
     *
     * @return int
     */
    public function getRatingId();

    /**
     * Get rating code.
     *
     * @return string
     */
    public function getRatingName();

    /**
     * Get rating code.
     *
     * @return string
     */
    public function getRatingCode();

    /**
     * Retrieve Review Vote in percent
     *
     * @return int
     */
    public function getPercent();

    /**
     * Get rating value.
     * 1 - 20%, 2 - 40%..5 - 100%
     *
     * @return int
     */
    public function getValue();

    /**
     * Set Review Percent
     *
     * @param int $percent
     * @return RatingVoteInterface
     */
    public function setPercent($percent);

    /**
     * Set vote id.
     *
     * @param int $id
     *
     * @return $this
     */
    public function setVoteId($id);

    /**
     * Set Rating Id
     *
     * @param int $ratingId
     *
     * @return $this
     */
    public function setRatingId($ratingId);

    /**
     * Set Rating Id
     *
     * @param int $entityId
     *
     * @return $this
     */
    public function setEntityId($entityId);

    /**
     * Set rating name.
     *
     * @param string $ratingName
     *
     * @return $this
     */
    public function setRatingName($ratingName);

    /**
     * Set rating code.
     *
     * @param string $ratingCode
     *
     * @return $this
     */
    public function setRatingCode($ratingCode);

    /**
     * Set rating value.
     *
     * @param int $value
     * @return $this
     */
    public function setValue($value);
}