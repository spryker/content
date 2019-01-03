<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Content\Persistence;

use Generated\Shared\Transfer\ContentTransfer;

interface ContentEntityManagerInterface
{
    /**
     * Specification:
     * - Creates or update content
     *
     * @param \Generated\Shared\Transfer\ContentTransfer $contentTransfer
     *
     * @return \Generated\Shared\Transfer\ContentTransfer
     */
    public function saveContent(ContentTransfer $contentTransfer): ContentTransfer;

    /**
     * Specification:
     * - Finds a content by content ID.
     * - Deletes the content.
     *
     * @param \Generated\Shared\Transfer\ContentTransfer $contentTransfer
     *
     * @return void
     */
    public function delete(ContentTransfer $contentTransfer): void;
}
