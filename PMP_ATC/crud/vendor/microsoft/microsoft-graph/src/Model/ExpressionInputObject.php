<?php
/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* ExpressionInputObject File
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
* ExpressionInputObject class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class ExpressionInputObject extends Entity
{

    /**
    * Gets the definition
    *
    * @return ObjectDefinition|null The definition
    */
    public function getDefinition()
    {
        if (array_key_exists("definition", $this->_propDict)) {
            if (is_a($this->_propDict["definition"], "\Microsoft\Graph\Model\ObjectDefinition") || is_null($this->_propDict["definition"])) {
                return $this->_propDict["definition"];
            } else {
                $this->_propDict["definition"] = new ObjectDefinition($this->_propDict["definition"]);
                return $this->_propDict["definition"];
            }
        }
        return null;
    }

    /**
    * Sets the definition
    *
    * @param ObjectDefinition $val The value to assign to the definition
    *
    * @return ExpressionInputObject The ExpressionInputObject
    */
    public function setDefinition($val)
    {
        $this->_propDict["definition"] = $val;
         return $this;
    }

    /**
    * Gets the expressionInputObjectProperties
    *
    * @return StringKeyObjectValuePair|null The expressionInputObjectProperties
    */
    public function getExpressionInputObjectProperties()
    {
        if (array_key_exists("properties", $this->_propDict)) {
            if (is_a($this->_propDict["properties"], "\Microsoft\Graph\Model\StringKeyObjectValuePair") || is_null($this->_propDict["properties"])) {
                return $this->_propDict["properties"];
            } else {
                $this->_propDict["properties"] = new StringKeyObjectValuePair($this->_propDict["properties"]);
                return $this->_propDict["properties"];
            }
        }
        return null;
    }

    /**
    * Sets the expressionInputObjectProperties
    *
    * @param StringKeyObjectValuePair $val The value to assign to the properties
    *
    * @return ExpressionInputObject The ExpressionInputObject
    */
    public function setExpressionInputObjectProperties($val)
    {
        $this->_propDict["properties"] = $val;
         return $this;
    }
}
