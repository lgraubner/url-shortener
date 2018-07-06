const path = require('path')
const glob = require('glob-all')
const ExtractTextPlugin = require('extract-text-webpack-plugin')
const PurgeCSSPlugin = require('purgecss-webpack-plugin')
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin')
const CleanWebpackPlugin = require('clean-webpack-plugin')
const ManifestPlugin = require('webpack-manifest-plugin')

// Custom PurgeCSS extractor for Tailwind that allows special characters in
// class names.
// https://github.com/FullHuman/purgecss#extractor
class TailwindExtractor {
  static extract(content) {
    return content.match(/[A-Za-z0-9-_:\\/]+/g) || []
  }
}

const webpackConfig = {
  entry: ['./resources/assets/js/app.js', './resources/assets/css/app.css'],
  output: {
    path: path.resolve(__dirname, 'public/dist'),
    filename: 'app_[chunkhash].js'
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        loaders: ['babel-loader']
      },
      {
        test: /\.js$/,
        exclude: /node_modules/,
        loader: 'eslint-loader'
      },
      {
        test: /\.css$/,
        use: ExtractTextPlugin.extract({
          fallback: 'style-loader',
          filename: 'public/dist/app_[contenthash].css',
          use: [
            {
              loader: 'css-loader',
              options: {
                importLoaders: 1
              }
            },
            'postcss-loader'
          ]
        })
      }
    ]
  },
  plugins: [
    new CleanWebpackPlugin(['public/dist']),
    new ExtractTextPlugin('app_[chunkhash].css'),
    new ManifestPlugin({
      fileName: path.resolve(__dirname, 'public/mix-manifest.json'),
      publicPath: '/dist/',
      generate: (seed, files) =>
        files.reduce(
          (manifest, { name, path }) => ({
            ...manifest,
            [`/dist/app${name.replace('main', '')}`]: path
          }),
          seed
        )
    })
  ]
}

module.exports = (env, options) => {
  if (options.mode === 'production') {
    webpackConfig.plugins = [
      ...webpackConfig.plugins,
      new PurgeCSSPlugin({
        paths: glob.sync([
          path.join(__dirname, 'resources/views/**/*.blade.php')
        ]),
        extractors: [
          {
            extractor: TailwindExtractor,
            extensions: ['html', 'js', 'php']
          }
        ]
      }),
      new OptimizeCssAssetsPlugin({
        cssProcessorOptions: {
          safe: true,
          discardComments: { removeAll: true }
        }
      })
    ]
  }

  return webpackConfig
}
