# Noise to Noise
## Image Restoration

The kernel is partially implementation of the <a href='https://arxiv.org/pdf/1803.04189.pdf'>article</a> entitled Noise2Noise, The main characteristics pointed out in this article is the ability to train the model only using noisy images rather than clean targets. In general, for purpose of image restoration a set of pairs consist of a corrupted image and clean target are used. Although, this article demonstrates that pairs having both corrupted image as input and target are eligible to feed a neural network and yield the same results. In some case even better results gained.

## Theoretical Background

In statistical data analysis, recently neural network have been piqued researchers intrests. Particularly a regression model like CNN for image restoration doimain. Having pair of inputs $(\hat{x}_i, y_i)$, $\hat{x}_i$ corrupted inputs and $y_i$ clean target, the aim is minimizing the emperical risk:

<div align="center">
  $argmin_{\theta}\sum_{i}{L(f_{\theta}(\hat{x}_i), y_i)}$
</div>

where $f_{\theta}$ is a parametric CNN model under the loss function of $L$. In statistical point of view we are dealing with minimizing the expected loss function:

<div align="center">
  $argmin_{\theta}\mathbb{E}\{{L(z, y)}\}$
</div>

where $z = f_{\theta}(\hat{x})$ and for $L_2$ function $L(z,y) = (z-y)^2$, the minimum foud at arithmetic mean $z = \mathbb{E}\{y\}$ and for $L_1$ the solution is median.

In image restoration using CNN, the general training procedure suggests $z = \mathbb{E}\{y\}$ for $L_2$ function. Which means feading the CNN model with noisy targets $y' = y + e$, where $e$ noises are zero-centered should suggest:

<div align="center">
  $z = \mathbb{E}\{y'\} = \mathbb{E}\{y\} + \mathbb{E}\{e\} = \mathbb{E}\{y\}$
</div>
