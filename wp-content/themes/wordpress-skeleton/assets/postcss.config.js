module.exports = {
  plugins: [
    require('cssnano')({}),
    require('postcss-preset-env')({
      browsers: 'last 2 versions',
    }),
  ],
};
