<?php
/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* SynchronizationQuarantine File
* PHP version 7
*
* @category  Library
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
namespace Microsoft\Graph\Model;
/**
* SynchronizationQuarantine class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class SynchronizationQuarantine extends Entity
{

    /**
    * Gets the currentBegan
    *
    * @return \DateTime|null The currentBegan
    */
    public function getCurrentBegan()
    {
        if (array_key_exists("currentBegan", $this->_propDict)) {
            if (is_a($this->_propDict["currentBegan"], "\DateTime") || is_null($this->_propDict["currentBegan"])) {
                return $this->_propDict["currentBegan"];
            } else {
                $this->_propDict["currentBegan"] = new \DateTime($this->_propDict["currentBegan"]);
                return $this->_propDict["currentBegan"];
            }
        }
        return null;
    }

    /**
    * Sets the currentBegan
    *
    * @param \DateTime $val The value to assign to the currentBegan
    *
    * @return SynchronizationQuarantine The SynchronizationQuarantine
    */
    public function setCurrentBegan($val)
    {
        $this->_propDict["currentBegan"] = $val;
         return $this;
    }

    /**
    * Gets the error
    *
    * @return SynchronizationError|null The error
    */
    public function getError()
    {
        if (array_key_exists("error", $this->_propDict)) {
            if (is_a($this->_propDict["error"], "\Microsoft\Graph\Model\SynchronizationError") || is_null($this->_propDict["error"])) {
                return $this->_propDict["error"];
            } else {
                $this->_propDict["error"] = new SynchronizationError($this->_propDict["error"]);
                return $this->_propDict["error"];
            }
        }
        return null;
    }

    /**
    * Sets the error
    *
    * @param SynchronizationError $val The value to assign to the error
    *
    * @return SynchronizationQuarantine The SynchronizationQuarantine
    */
    public function setError($val)
    {
        $this->_propDict["error"] = $val;
         return $this;
    }

    /**
    * Gets the nextAttempt
    *
    * @return \DateTime|null The nextAttempt
    */
    public function getNextAttempt()
    {
        if (array_key_exists("nextAttempt", $this->_propDict)) {
            if (is_a($this->_propDict["nextAttempt"], "\DateTime") || is_null($this->_propDict["nextAttempt"])) {
                return $this->_propDict["nextAttempt"];
            } else {
                $this->_propDict["nextAttempt"] = new \DateTime($this->_propDict["nextAttempt"]);
                return $this->_propDict["nextAttempt"];
            }
        }
        return null;
    }

    /**
    * Sets the nextAttempt
    *
    * @param \DateTime $val The value to assign to the nextAttempt
    *
    * @return SynchronizationQuarantine The SynchronizationQuarantine
    */
    public function setNextAttempt($val)
    {
        $this->_propDict["nextAttempt"] = $val;
         return $this;
    }

    /**
    * Gets the reason
    *
    * @return QuarantineReason|null The reason
    */
    public function getReason()
    {
        if (array_key_exists("reason", $this->_propDict)) {
            if (is_a($this->_propDict["reason"], "\Microsoft\Graph\Model\QuarantineReason") || is_null($this->_propDict["reason"])) {
                return $this->_propDict["reason"];
            } else {
                $this->_propDict["reason"] = new QuarantineReason($this->_propDict["reason"]);
                return $this->_propDict["reason"];
            }
        }
        return null;
    }

    /**
    * Sets the reason
    *
    * @param QuarantineReason $val The value to assign to the reason
    *
    * @return SynchronizationQuarantine The SynchronizationQuarantine
    */
    public function setReason($val)
    {
        $this->_propDict["reason"] = $val;
         return $this;
    }

    /**
    * Gets the seriesBegan
    *
    * @return \DateTime|null The seriesBegan
    */
    public function getSeriesBegan()
    {
        if (array_key_exists("seriesBegan", $this->_propDict)) {
            if (is_a($this->_propDict["seriesBegan"], "\DateTime") || is_null($this->_propDict["seriesBegan"])) {
                return $this->_propDict["seriesBegan"];
            } else {
                $this->_propDict["seriesBegan"] = new \DateTime($this->_propDict["seriesBegan"]);
                return $this->_propDict["seriesBegan"];
            }
        }
        return null;
    }

    /**
    * Sets the seriesBegan
    *
    * @param \DateTime $val The value to assign to the seriesBegan
    *
    * @return SynchronizationQuarantine The SynchronizationQuarantine
    */
    public function setSeriesBegan($val)
    {
        $this->_propDict["seriesBegan"] = $val;
         return $this;
    }
    /**
    * Gets the seriesCount
    *
    * @return int|null The seriesCount
    */
    public function getSeriesCount()
    {
        if (array_key_exists("seriesCount", $this->_propDict)) {
            return $this->_propDict["seriesCount"];
        } else {
            return null;
        }
    }

    /**
    * Sets the seriesCount
    *
    * @param int $val The value of the seriesCount
    *
    * @return SynchronizationQuarantine
    */
    public function setSeriesCount($val)
    {
        $this->_propDict["seriesCount"] = $val;
        return $this;
    }
}
