# Noise to Noise
## Image Restoration

The kernel is partially implementation of the <a href='https://arxiv.org/pdf/1803.04189.pdf'>article</a> entitled Noise2Noise, The main characteristics pointed out in this article is the ability to train the model only using noisy images rather than clean targets. In general, for purpose of image restoration a set of pairs consist of a corrupted image and clean target are used. Although, this article demonstrates that pairs having both corrupted image as input and target are eligible to feed a neural network and yield the same results. In some case even better results gained.

Reach out noise2noise.ipynb 
