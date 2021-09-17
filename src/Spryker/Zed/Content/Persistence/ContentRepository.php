<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Content\Persistence;

use Generated\Shared\Transfer\ContentTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

/**
 * @method \Spryker\Zed\Content\Persistence\ContentPersistenceFactory getFactory()
 */
class ContentRepository extends AbstractRepository implements ContentRepositoryInterface
{
    /**
     * {@inheritDoc}
     *
     * @param int $idContent
     *
     * @return \Generated\Shared\Transfer\ContentTransfer|null
     */
    public function findContentById(int $idContent): ?ContentTransfer
    {
        $contentEntity = $this->getFactory()
            ->createContentQuery()
            ->findOneByIdContent($idContent);

        if ($contentEntity === null) {
            return null;
        }

        return $this->getFactory()->createContentMapper()->mapContentEntityToTransfer($contentEntity);
    }

    /**
     * {@inheritDoc}
     *
     * @param string $contentKey
     *
     * @return \Generated\Shared\Transfer\ContentTransfer|null
     */
    public function findContentByKey(string $contentKey): ?ContentTransfer
    {
        $contentEntity = $this->getFactory()
            ->createContentQuery()
            ->findOneByKey($contentKey);

        if ($contentEntity === null) {
            return null;
        }

        return $this->getFactory()->createContentMapper()->mapContentEntityToTransfer($contentEntity);
    }

    /**
     * @param array<string> $contentKeys
     *
     * @return array<\Generated\Shared\Transfer\ContentTransfer>
     */
    public function getContentByKeys(array $contentKeys): array
    {
        $contentEntities = $this->getFactory()
            ->createContentQuery()
            ->filterByKey_In($contentKeys)
            ->find();

        return $this->getFactory()
            ->createContentMapper()
            ->mapContentEntitiesToContentTransfers($contentEntities);
    }

    /**
     * {@inheritDoc}
     *
     * @param string $key
     *
     * @return bool
     */
    public function hasKey(string $key): bool
    {
        return $this->getFactory()
            ->createContentQuery()
            ->filterByKey($key)
            ->exists();
    }
}
