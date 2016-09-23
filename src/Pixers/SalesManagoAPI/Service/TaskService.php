<?php

namespace Pixers\SalesManagoAPI\Service;

/**
 * @author Sylwester Łuczak <sylwester.luczak@pixers.pl>
 */
class TaskService extends AbstractService
{
    /**
     * Create new task.
     *
     * @param  array $data Task data
     * @param bool   $taskId
     * @param bool   $finished
     *
     * @return array
     */
    public function create(array $data, $taskId = false, $finished = false)
    {
        $data = self::mergeData($data, [
          'finished' => $finished,
          'smContactTaskReq' => [
            'id' => $taskId,
          ],
        ]);

        return $this->client->doPost('contact/updateTask', $data);
    }

    /**
     * Update task.
     *
     * @param  string $taskId Task internal ID
     * @param  array  $data   Task data
     * @return array
     */
    public function update($taskId, array $data)
    {
        return $this->create($data, $taskId);
    }

    /**
     * Delete task.
     *
     * @param  string $taskId Task internal ID
     * @return array
     */
    public function delete($taskId)
    {
        return $this->create($taskId, null, true);
    }
}
