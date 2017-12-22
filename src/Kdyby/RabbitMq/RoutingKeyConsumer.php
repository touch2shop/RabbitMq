<?php
namespace Kdyby\RabbitMq;

class RoutingKeyConsumer extends Consumer
{
	/**
	 * Generate queue name - add routing key to current queue name.
	 */
	protected function queueDeclare()
	{
		if ($this->routingKey === '') {
			return;
		}
		$queueName = $this->queueOptions['name'] . '-' . $this->routingKey;
		$this->queueOptions['name'] = $queueName;
		$this->doQueueDeclare($queueName, $this->queueOptions);
		$this->queueDeclared = TRUE;
	}
}
