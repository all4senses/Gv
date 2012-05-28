<?php

/**
 * @file
 * File with Implementations views hooks.
 */

/**
 * Implements hook_views_default_views().
 * Programmatically create new views.
 *
 * @return object
 *   Views description object.
 */
function gv_misc_views_default_views() {
 
  
  return NULL;
  
  
  
  /* Articles */
  /* ---------------------------------------------------------------- */
  
  $view = new view;
  $view->name = 'articles';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'Articles';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Articles';
  $handler->display->display_options['use_more'] = TRUE;
  $handler->display->display_options['use_more_always'] = TRUE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['query']['options']['query_comment'] = FALSE;
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '3';
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['row_plugin'] = 'node';
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['title']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['title']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = 0;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = 0;
  $handler->display->display_options['fields']['title']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['title']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['title']['alter']['html'] = 0;
  $handler->display->display_options['fields']['title']['hide_empty'] = 0;
  $handler->display->display_options['fields']['title']['empty_zero'] = 0;
  $handler->display->display_options['fields']['title']['link_to_node'] = 1;
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'article' => 'article',
  );

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page');
  $handler->display->display_options['defaults']['use_more'] = FALSE;
  $handler->display->display_options['use_more_always'] = TRUE;
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '8';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['pager']['options']['id'] = '0';
  $handler->display->display_options['pager']['options']['expose']['items_per_page_options_all'] = 0;
  $handler->display->display_options['path'] = 'about-voip-services';

  /* Display: Block - All latest posts */
  $handler = $view->new_display('block', 'Block - All latest posts', 'block');
  $handler->display->display_options['defaults']['title'] = FALSE;
  $handler->display->display_options['title'] = 'Latest VoIP articles (+ news, blog posts, etc)';
  $handler->display->display_options['display_description'] = 'All latest Articles, News, Blog posts, etc';
  $handler->display->display_options['defaults']['use_more'] = FALSE;
  $handler->display->display_options['use_more'] = TRUE;
  $handler->display->display_options['use_more_always'] = TRUE;
  $handler->display->display_options['use_more_text'] = 'read all.';
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'some';
  $handler->display->display_options['pager']['options']['items_per_page'] = '3';
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'fields';
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['title']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['title']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = 0;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = 0;
  $handler->display->display_options['fields']['title']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['title']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['title']['alter']['html'] = 0;
  $handler->display->display_options['fields']['title']['hide_empty'] = 0;
  $handler->display->display_options['fields']['title']['empty_zero'] = 0;
  $handler->display->display_options['fields']['title']['link_to_node'] = 1;
  /* Field: Content: Post date */
  $handler->display->display_options['fields']['created']['id'] = 'created';
  $handler->display->display_options['fields']['created']['table'] = 'node';
  $handler->display->display_options['fields']['created']['field'] = 'created';
  $handler->display->display_options['fields']['created']['label'] = '';
  $handler->display->display_options['fields']['created']['exclude'] = TRUE;
  $handler->display->display_options['fields']['created']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['created']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['created']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['created']['alter']['external'] = 0;
  $handler->display->display_options['fields']['created']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['created']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['created']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['created']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['created']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['created']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['created']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['created']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['created']['alter']['html'] = 0;
  $handler->display->display_options['fields']['created']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['created']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['created']['hide_empty'] = 0;
  $handler->display->display_options['fields']['created']['empty_zero'] = 0;
  $handler->display->display_options['fields']['created']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['created']['date_format'] = 'custom';
  $handler->display->display_options['fields']['created']['custom_date_format'] = 'm-d-y';
  /* Field: Content: Body */
  $handler->display->display_options['fields']['body']['id'] = 'body';
  $handler->display->display_options['fields']['body']['table'] = 'field_data_body';
  $handler->display->display_options['fields']['body']['field'] = 'body';
  $handler->display->display_options['fields']['body']['label'] = '';
  $handler->display->display_options['fields']['body']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['body']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['body']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['body']['alter']['external'] = 0;
  $handler->display->display_options['fields']['body']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['body']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['body']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['body']['alter']['max_length'] = '100';
  $handler->display->display_options['fields']['body']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['body']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['body']['alter']['more_link'] = 1;
  $handler->display->display_options['fields']['body']['alter']['more_link_text'] = 'read more.';
  $handler->display->display_options['fields']['body']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['body']['alter']['trim'] = 1;
  $handler->display->display_options['fields']['body']['alter']['preserve_tags'] = '<p> <br> <span> <div> <strong> <b>';
  $handler->display->display_options['fields']['body']['alter']['html'] = 0;
  $handler->display->display_options['fields']['body']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['body']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['body']['hide_empty'] = 0;
  $handler->display->display_options['fields']['body']['empty_zero'] = 0;
  $handler->display->display_options['fields']['body']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['body']['type'] = 'text_plain';
  $handler->display->display_options['fields']['body']['settings'] = array(
    'trim_length' => '100',
  );
  $handler->display->display_options['fields']['body']['field_api_classes'] = 0;
  $handler->display->display_options['defaults']['filters'] = FALSE;
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'article' => 'article',
    'blog_post' => 'blog_post',
    'news_post' => 'news_post',
  );

  /* Display: Block - Latest articles */
  $handler = $view->new_display('block', 'Block - Latest articles', 'block_1');
  $handler->display->display_options['defaults']['title'] = FALSE;
  $handler->display->display_options['title'] = 'All About VoIP';
  $handler->display->display_options['display_description'] = 'Latest VoIP articles';
  $handler->display->display_options['defaults']['use_more'] = FALSE;
  $handler->display->display_options['use_more'] = TRUE;
  $handler->display->display_options['use_more_always'] = TRUE;
  $handler->display->display_options['use_more_text'] = 'View All >>';
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'some';
  $handler->display->display_options['pager']['options']['items_per_page'] = '10';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'fields';
  $handler->display->display_options['row_options']['hide_empty'] = 0;
  $handler->display->display_options['row_options']['default_field_elements'] = 1;
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['filters'] = FALSE;
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'article' => 'article',
  );
  /* Filter criterion: Content: Show in block (field_show_in_block) */
  $handler->display->display_options['filters']['field_show_in_block_value']['id'] = 'field_show_in_block_value';
  $handler->display->display_options['filters']['field_show_in_block_value']['table'] = 'field_data_field_show_in_block';
  $handler->display->display_options['filters']['field_show_in_block_value']['field'] = 'field_show_in_block_value';
  $handler->display->display_options['filters']['field_show_in_block_value']['value'] = array(
    1 => '1',
  );

  /* Display: Page - Filtered by topics */
  $handler = $view->new_display('page', 'Page - Filtered by topics', 'page_by_tag');
  $handler->display->display_options['defaults']['use_more'] = FALSE;
  $handler->display->display_options['use_more_always'] = TRUE;
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '8';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['pager']['options']['id'] = '0';
  $handler->display->display_options['pager']['options']['expose']['items_per_page_options_all'] = 0;
  $handler->display->display_options['defaults']['arguments'] = FALSE;
  /* Contextual filter: Content: Topics (field_topics) */
  $handler->display->display_options['arguments']['field_topics_tid']['id'] = 'field_topics_tid';
  $handler->display->display_options['arguments']['field_topics_tid']['table'] = 'field_data_field_topics';
  $handler->display->display_options['arguments']['field_topics_tid']['field'] = 'field_topics_tid';
  $handler->display->display_options['arguments']['field_topics_tid']['default_action'] = 'empty';
  $handler->display->display_options['arguments']['field_topics_tid']['title_enable'] = 1;
  $handler->display->display_options['arguments']['field_topics_tid']['title'] = 'Articles, tagged with "%1"';
  $handler->display->display_options['arguments']['field_topics_tid']['default_argument_type'] = 'fixed';
  $handler->display->display_options['arguments']['field_topics_tid']['default_argument_skip_url'] = 0;
  $handler->display->display_options['arguments']['field_topics_tid']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['field_topics_tid']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['field_topics_tid']['summary_options']['items_per_page'] = '25';
  $handler->display->display_options['arguments']['field_topics_tid']['specify_validation'] = 1;
  $handler->display->display_options['arguments']['field_topics_tid']['validate']['type'] = 'taxonomy_term';
  $handler->display->display_options['arguments']['field_topics_tid']['validate_options']['vocabularies'] = array(
    'topics' => 'topics',
  );
  $handler->display->display_options['arguments']['field_topics_tid']['validate_options']['type'] = 'convert';
  $handler->display->display_options['arguments']['field_topics_tid']['validate_options']['transform'] = '1';
  $handler->display->display_options['arguments']['field_topics_tid']['validate']['fail'] = 'empty';
  $handler->display->display_options['arguments']['field_topics_tid']['break_phrase'] = 0;
  $handler->display->display_options['arguments']['field_topics_tid']['not'] = 0;
  $handler->display->display_options['path'] = 'articles/tags/%';

  $views[$view->name] = $view;
  
  
  
  
  
  
  
  
  
  
  /* Blog */
  /* ---------------------------------------------------------------- */
  
  $view = new view;
  $view->name = 'blog';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'Blog';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Blog';
  $handler->display->display_options['use_more_always'] = TRUE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['query']['options']['query_comment'] = FALSE;
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '3';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['pager']['options']['id'] = '0';
  $handler->display->display_options['pager']['options']['expose']['items_per_page_options_all'] = 0;
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['row_plugin'] = 'node';
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['title']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['title']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = 0;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = 0;
  $handler->display->display_options['fields']['title']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['title']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['title']['alter']['html'] = 0;
  $handler->display->display_options['fields']['title']['hide_empty'] = 0;
  $handler->display->display_options['fields']['title']['empty_zero'] = 0;
  $handler->display->display_options['fields']['title']['link_to_node'] = 1;
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'blog_post' => 'blog_post',
  );

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page');
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '8';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['pager']['options']['id'] = '0';
  $handler->display->display_options['pager']['options']['expose']['items_per_page_options_all'] = 0;
  $handler->display->display_options['path'] = 'blog';

  /* Display: Block */
  $handler = $view->new_display('block', 'Block', 'block');
  $handler->display->display_options['defaults']['title'] = FALSE;
  $handler->display->display_options['title'] = 'Latest Blog Posts';
  $handler->display->display_options['defaults']['use_more'] = FALSE;
  $handler->display->display_options['use_more'] = TRUE;
  $handler->display->display_options['use_more_always'] = TRUE;
  $handler->display->display_options['use_more_text'] = 'View All >>';
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'some';
  $handler->display->display_options['pager']['options']['items_per_page'] = '3';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'list';
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'fields';
  $handler->display->display_options['row_options']['inline'] = array(
    'title' => 'title',
  );
  $handler->display->display_options['row_options']['hide_empty'] = 0;
  $handler->display->display_options['row_options']['default_field_elements'] = 1;
  $handler->display->display_options['defaults']['row_options'] = FALSE;

  /* Display: Page - Filtered by topics */
  $handler = $view->new_display('page', 'Page - Filtered by topics', 'page_by_tag');
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '8';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['pager']['options']['id'] = '0';
  $handler->display->display_options['pager']['options']['expose']['items_per_page_options_all'] = 0;
  $handler->display->display_options['defaults']['relationships'] = FALSE;
  $handler->display->display_options['defaults']['arguments'] = FALSE;
  /* Contextual filter: Content: Topics (field_topics) */
  $handler->display->display_options['arguments']['field_topics_tid']['id'] = 'field_topics_tid';
  $handler->display->display_options['arguments']['field_topics_tid']['table'] = 'field_data_field_topics';
  $handler->display->display_options['arguments']['field_topics_tid']['field'] = 'field_topics_tid';
  $handler->display->display_options['arguments']['field_topics_tid']['default_action'] = 'empty';
  $handler->display->display_options['arguments']['field_topics_tid']['title_enable'] = 1;
  $handler->display->display_options['arguments']['field_topics_tid']['title'] = 'Blog posts, tagged with "%1"';
  $handler->display->display_options['arguments']['field_topics_tid']['default_argument_type'] = 'fixed';
  $handler->display->display_options['arguments']['field_topics_tid']['default_argument_skip_url'] = 0;
  $handler->display->display_options['arguments']['field_topics_tid']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['field_topics_tid']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['field_topics_tid']['summary_options']['items_per_page'] = '25';
  $handler->display->display_options['arguments']['field_topics_tid']['specify_validation'] = 1;
  $handler->display->display_options['arguments']['field_topics_tid']['validate']['type'] = 'taxonomy_term';
  $handler->display->display_options['arguments']['field_topics_tid']['validate_options']['vocabularies'] = array(
    'topics' => 'topics',
  );
  $handler->display->display_options['arguments']['field_topics_tid']['validate_options']['type'] = 'convert';
  $handler->display->display_options['arguments']['field_topics_tid']['validate_options']['transform'] = '1';
  $handler->display->display_options['arguments']['field_topics_tid']['validate']['fail'] = 'empty';
  $handler->display->display_options['arguments']['field_topics_tid']['break_phrase'] = 0;
  $handler->display->display_options['arguments']['field_topics_tid']['not'] = 0;
  $handler->display->display_options['path'] = 'blog/tags/%';
  
  $views[$view->name] = $view;

  
  
  
  
  
  
  
  /* Content GetVoIP */
  /* ---------------------------------------------------------------- */
  
  $view = new view;
  $view->name = 'content_getvoip';
  $view->description = 'Emulates the Drupal content administration page.';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'Content GetVoIP';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Content GetVoIP';
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['access']['perm'] = 'administer content';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['query']['options']['query_comment'] = FALSE;
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['exposed_form']['options']['autosubmit'] = 0;
  $handler->display->display_options['exposed_form']['options']['autosubmit_hide'] = 1;
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '20';
  $handler->display->display_options['style_plugin'] = 'table';
  $handler->display->display_options['style_options']['columns'] = array(
    'views_bulk_operations' => 'views_bulk_operations',
    'title' => 'title',
    'timestamp' => 'title',
    'type' => 'type',
    'field_p_name' => 'field_p_name',
    'field_r_provider_name' => 'field_r_provider_name',
    'php' => 'php',
    'php_1' => 'php_1',
    'name' => 'name',
    'status' => 'status',
    'field_p_erating' => 'field_p_erating',
    'field_show_in_block' => 'field_show_in_block',
    'edit_node' => 'edit_node',
  );
  $handler->display->display_options['style_options']['default'] = 'field_p_erating';
  $handler->display->display_options['style_options']['info'] = array(
    'views_bulk_operations' => array(
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'title' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'timestamp' => array(
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'type' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'field_p_name' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 1,
    ),
    'field_r_provider_name' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 1,
    ),
    'php' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 1,
    ),
    'php_1' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 1,
    ),
    'name' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'status' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'field_p_erating' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 1,
    ),
    'field_show_in_block' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 1,
    ),
    'edit_node' => array(
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
  );
  $handler->display->display_options['style_options']['override'] = 1;
  $handler->display->display_options['style_options']['sticky'] = 0;
  $handler->display->display_options['style_options']['empty_table'] = 1;
  /* Header: Global: PHP */
  $handler->display->display_options['header']['php']['id'] = 'php';
  $handler->display->display_options['header']['php']['table'] = 'views';
  $handler->display->display_options['header']['php']['field'] = 'php';
  $handler->display->display_options['header']['php']['label'] = 'Add content header';
  $handler->display->display_options['header']['php']['empty'] = TRUE;
  $handler->display->display_options['header']['php']['php_output'] = '<?php 
  echo render(drupal_get_form(\'gv_misc_AddContentSection_form\'))
  ?>';
  /* No results behavior: Global: Text area */
  $handler->display->display_options['empty']['area']['id'] = 'area';
  $handler->display->display_options['empty']['area']['table'] = 'views';
  $handler->display->display_options['empty']['area']['field'] = 'area';
  $handler->display->display_options['empty']['area']['empty'] = FALSE;
  $handler->display->display_options['empty']['area']['content'] = 'No content available.';
  $handler->display->display_options['empty']['area']['format'] = 'filtered_html';
  $handler->display->display_options['empty']['area']['tokenize'] = 0;
  /* Relationship: Content: Author */
  $handler->display->display_options['relationships']['uid']['id'] = 'uid';
  $handler->display->display_options['relationships']['uid']['table'] = 'node';
  $handler->display->display_options['relationships']['uid']['field'] = 'uid';
  /* Field: Bulk operations: Content */
  $handler->display->display_options['fields']['views_bulk_operations']['id'] = 'views_bulk_operations';
  $handler->display->display_options['fields']['views_bulk_operations']['table'] = 'node';
  $handler->display->display_options['fields']['views_bulk_operations']['field'] = 'views_bulk_operations';
  $handler->display->display_options['fields']['views_bulk_operations']['label'] = '';
  $handler->display->display_options['fields']['views_bulk_operations']['exclude'] = TRUE;
  $handler->display->display_options['fields']['views_bulk_operations']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['views_bulk_operations']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['views_bulk_operations']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['views_bulk_operations']['alter']['external'] = 0;
  $handler->display->display_options['fields']['views_bulk_operations']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['views_bulk_operations']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['views_bulk_operations']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['views_bulk_operations']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['views_bulk_operations']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['views_bulk_operations']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['views_bulk_operations']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['views_bulk_operations']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['views_bulk_operations']['alter']['html'] = 0;
  $handler->display->display_options['fields']['views_bulk_operations']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['views_bulk_operations']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['views_bulk_operations']['hide_empty'] = 0;
  $handler->display->display_options['fields']['views_bulk_operations']['empty_zero'] = 0;
  $handler->display->display_options['fields']['views_bulk_operations']['hide_alter_empty'] = 0;
  $handler->display->display_options['fields']['views_bulk_operations']['vbo']['entity_load_capacity'] = '10';
  $handler->display->display_options['fields']['views_bulk_operations']['vbo']['operations'] = array(
    'action::node_assign_owner_action' => array(
      'selected' => 1,
      'use_queue' => 0,
      'skip_confirmation' => 0,
      'override_label' => 0,
      'label' => '',
    ),
    'action::views_bulk_operations_delete_item' => array(
      'selected' => 1,
      'use_queue' => 0,
      'skip_confirmation' => 0,
      'override_label' => 0,
      'label' => '',
    ),
    'action::system_message_action' => array(
      'selected' => 0,
      'use_queue' => 0,
      'skip_confirmation' => 0,
      'override_label' => 0,
      'label' => '',
    ),
    'action::views_bulk_operations_script_action' => array(
      'selected' => 0,
      'use_queue' => 0,
      'skip_confirmation' => 0,
      'override_label' => 0,
      'label' => '',
    ),
    'action::node_make_sticky_action' => array(
      'selected' => 0,
      'use_queue' => 0,
      'skip_confirmation' => 0,
      'override_label' => 0,
      'label' => '',
    ),
    'action::node_make_unsticky_action' => array(
      'selected' => 0,
      'use_queue' => 0,
      'skip_confirmation' => 0,
      'override_label' => 0,
      'label' => '',
    ),
    'action::views_bulk_operations_modify_action' => array(
      'selected' => 0,
      'use_queue' => 0,
      'skip_confirmation' => 0,
      'override_label' => 1,
      'label' => 'Modify content fields values',
      'settings' => array(
        'show_all_tokens' => 0,
        'display_values' => array(
          'provider::field_p_erating' => 'provider::field_p_erating',
        ),
      ),
    ),
    'action::views_bulk_operations_argument_selector_action' => array(
      'selected' => 0,
      'skip_confirmation' => 0,
      'override_label' => 0,
      'label' => '',
      'settings' => array(
        'url' => '',
      ),
    ),
    'action::node_promote_action' => array(
      'selected' => 0,
      'use_queue' => 0,
      'skip_confirmation' => 0,
      'override_label' => 0,
      'label' => '',
    ),
    'action::node_publish_action' => array(
      'selected' => 1,
      'use_queue' => 0,
      'skip_confirmation' => 0,
      'override_label' => 0,
      'label' => '',
    ),
    'action::system_goto_action' => array(
      'selected' => 0,
      'use_queue' => 0,
      'skip_confirmation' => 0,
      'override_label' => 0,
      'label' => '',
    ),
    'action::node_unpromote_action' => array(
      'selected' => 0,
      'use_queue' => 0,
      'skip_confirmation' => 0,
      'override_label' => 0,
      'label' => '',
    ),
    'action::node_save_action' => array(
      'selected' => 0,
      'use_queue' => 0,
      'skip_confirmation' => 0,
      'override_label' => 0,
      'label' => '',
    ),
    'action::system_send_email_action' => array(
      'selected' => 0,
      'use_queue' => 0,
      'skip_confirmation' => 0,
      'override_label' => 0,
      'label' => '',
    ),
    'action::node_unpublish_action' => array(
      'selected' => 1,
      'use_queue' => 0,
      'skip_confirmation' => 0,
      'override_label' => 0,
      'label' => '',
    ),
    'action::node_unpublish_by_keyword_action' => array(
      'selected' => 0,
      'use_queue' => 0,
      'skip_confirmation' => 0,
      'override_label' => 0,
      'label' => '',
    ),
  );
  $handler->display->display_options['fields']['views_bulk_operations']['vbo']['enable_select_all_pages'] = 0;
  $handler->display->display_options['fields']['views_bulk_operations']['vbo']['display_type'] = '0';
  $handler->display->display_options['fields']['views_bulk_operations']['vbo']['display_result'] = 1;
  $handler->display->display_options['fields']['views_bulk_operations']['vbo']['merge_single_action'] = 1;
  $handler->display->display_options['fields']['views_bulk_operations']['vbo']['force_single'] = 0;
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['title']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['title']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['title']['alter']['external'] = 0;
  $handler->display->display_options['fields']['title']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['title']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = 0;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = 0;
  $handler->display->display_options['fields']['title']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['title']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['title']['alter']['html'] = 0;
  $handler->display->display_options['fields']['title']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['title']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['title']['hide_empty'] = 0;
  $handler->display->display_options['fields']['title']['empty_zero'] = 0;
  $handler->display->display_options['fields']['title']['link_to_node'] = 1;
  /* Field: Content: Has new content */
  $handler->display->display_options['fields']['timestamp']['id'] = 'timestamp';
  $handler->display->display_options['fields']['timestamp']['table'] = 'history';
  $handler->display->display_options['fields']['timestamp']['field'] = 'timestamp';
  $handler->display->display_options['fields']['timestamp']['label'] = 'New?';
  $handler->display->display_options['fields']['timestamp']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['timestamp']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['timestamp']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['timestamp']['alter']['external'] = 0;
  $handler->display->display_options['fields']['timestamp']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['timestamp']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['timestamp']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['timestamp']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['timestamp']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['timestamp']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['timestamp']['alter']['html'] = 0;
  $handler->display->display_options['fields']['timestamp']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['timestamp']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['timestamp']['hide_empty'] = 0;
  $handler->display->display_options['fields']['timestamp']['empty_zero'] = 0;
  $handler->display->display_options['fields']['timestamp']['link_to_node'] = 0;
  $handler->display->display_options['fields']['timestamp']['comments'] = 0;
  /* Field: Content: Type */
  $handler->display->display_options['fields']['type']['id'] = 'type';
  $handler->display->display_options['fields']['type']['table'] = 'node';
  $handler->display->display_options['fields']['type']['field'] = 'type';
  $handler->display->display_options['fields']['type']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['type']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['type']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['type']['alter']['external'] = 0;
  $handler->display->display_options['fields']['type']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['type']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['type']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['type']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['type']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['type']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['type']['alter']['html'] = 0;
  $handler->display->display_options['fields']['type']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['type']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['type']['hide_empty'] = 0;
  $handler->display->display_options['fields']['type']['empty_zero'] = 0;
  $handler->display->display_options['fields']['type']['link_to_node'] = 0;
  $handler->display->display_options['fields']['type']['machine_name'] = 0;
  /* Field: Content: Provider Name */
  $handler->display->display_options['fields']['field_p_name']['id'] = 'field_p_name';
  $handler->display->display_options['fields']['field_p_name']['table'] = 'field_data_field_p_name';
  $handler->display->display_options['fields']['field_p_name']['field'] = 'field_p_name';
  $handler->display->display_options['fields']['field_p_name']['label'] = 'Provider Name (P)';
  $handler->display->display_options['fields']['field_p_name']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['field_p_name']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['field_p_name']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['field_p_name']['alter']['external'] = 0;
  $handler->display->display_options['fields']['field_p_name']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['field_p_name']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['field_p_name']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['field_p_name']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['field_p_name']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['field_p_name']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['field_p_name']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['field_p_name']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['field_p_name']['alter']['html'] = 0;
  $handler->display->display_options['fields']['field_p_name']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['field_p_name']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['field_p_name']['hide_empty'] = 1;
  $handler->display->display_options['fields']['field_p_name']['empty_zero'] = 0;
  $handler->display->display_options['fields']['field_p_name']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['field_p_name']['field_api_classes'] = 0;
  /* Field: Content: Provider Name */
  $handler->display->display_options['fields']['field_r_provider_name']['id'] = 'field_r_provider_name';
  $handler->display->display_options['fields']['field_r_provider_name']['table'] = 'field_data_field_r_provider_name';
  $handler->display->display_options['fields']['field_r_provider_name']['field'] = 'field_r_provider_name';
  $handler->display->display_options['fields']['field_r_provider_name']['label'] = 'Provider Name (R)';
  $handler->display->display_options['fields']['field_r_provider_name']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['field_r_provider_name']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['field_r_provider_name']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['field_r_provider_name']['alter']['external'] = 0;
  $handler->display->display_options['fields']['field_r_provider_name']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['field_r_provider_name']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['field_r_provider_name']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['field_r_provider_name']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['field_r_provider_name']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['field_r_provider_name']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['field_r_provider_name']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['field_r_provider_name']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['field_r_provider_name']['alter']['html'] = 0;
  $handler->display->display_options['fields']['field_r_provider_name']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['field_r_provider_name']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['field_r_provider_name']['hide_empty'] = 1;
  $handler->display->display_options['fields']['field_r_provider_name']['empty_zero'] = 0;
  $handler->display->display_options['fields']['field_r_provider_name']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['field_r_provider_name']['field_api_classes'] = 0;
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php']['id'] = 'php';
  $handler->display->display_options['fields']['php']['table'] = 'views';
  $handler->display->display_options['fields']['php']['field'] = 'php';
  $handler->display->display_options['fields']['php']['label'] = 'Service Type (P)';
  $handler->display->display_options['fields']['php']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php']['php_value'] = 'if ($data->node_type == \'provider\') {
    $query = db_select(\'field_data_field_p_types\', \'pt\');
    $query->fields(\'pt\', array(\'field_p_types_value\'))
                  ->condition(\'pt.entity_id\', $data->nid);
    $type = $query->execute()->fetchField(); 
    return $type;
  }
  ';
  $handler->display->display_options['fields']['php']['php_output'] = '<?php 
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php']['use_php_click_sortable'] = '2';
  $handler->display->display_options['fields']['php']['php_click_sortable'] = '';
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_1']['id'] = 'php_1';
  $handler->display->display_options['fields']['php_1']['table'] = 'views';
  $handler->display->display_options['fields']['php_1']['field'] = 'php';
  $handler->display->display_options['fields']['php_1']['label'] = 'Service Type (R)';
  $handler->display->display_options['fields']['php_1']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_1']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_1']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_1']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php_1']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_1']['hide_empty'] = 1;
  $handler->display->display_options['fields']['php_1']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_1']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_1']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_1']['php_value'] = 'if ($data->node_type == \'review\') {
    $query = db_select(\'field_data_field_ref_provider\', \'rp\');
    $query->join(\'field_data_field_p_types\', \'pt\', "pt.entity_id = rp.field_ref_provider_target_id") ;
    $query->fields(\'pt\', array(\'field_p_types_value\'))
                  ->condition(\'rp.entity_id\', $data->nid);
    $type = $query->execute()->fetchField(); 
    return $type;
  }';
  $handler->display->display_options['fields']['php_1']['php_output'] = '<?php
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php_1']['use_php_click_sortable'] = '2';
  $handler->display->display_options['fields']['php_1']['php_click_sortable'] = '';
  /* Field: User: Name */
  $handler->display->display_options['fields']['name']['id'] = 'name';
  $handler->display->display_options['fields']['name']['table'] = 'users';
  $handler->display->display_options['fields']['name']['field'] = 'name';
  $handler->display->display_options['fields']['name']['relationship'] = 'uid';
  $handler->display->display_options['fields']['name']['label'] = 'Author';
  $handler->display->display_options['fields']['name']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['name']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['name']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['name']['alter']['external'] = 0;
  $handler->display->display_options['fields']['name']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['name']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['name']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['name']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['name']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['name']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['name']['alter']['html'] = 0;
  $handler->display->display_options['fields']['name']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['name']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['name']['hide_empty'] = 0;
  $handler->display->display_options['fields']['name']['empty_zero'] = 0;
  $handler->display->display_options['fields']['name']['link_to_user'] = 1;
  $handler->display->display_options['fields']['name']['overwrite_anonymous'] = 0;
  /* Field: Content: Published */
  $handler->display->display_options['fields']['status']['id'] = 'status';
  $handler->display->display_options['fields']['status']['table'] = 'node';
  $handler->display->display_options['fields']['status']['field'] = 'status';
  $handler->display->display_options['fields']['status']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['status']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['status']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['status']['alter']['external'] = 0;
  $handler->display->display_options['fields']['status']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['status']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['status']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['status']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['status']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['status']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['status']['alter']['html'] = 0;
  $handler->display->display_options['fields']['status']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['status']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['status']['hide_empty'] = 0;
  $handler->display->display_options['fields']['status']['empty_zero'] = 0;
  $handler->display->display_options['fields']['status']['not'] = 0;
  /* Field: Content: Listing Position */
  $handler->display->display_options['fields']['field_p_erating']['id'] = 'field_p_erating';
  $handler->display->display_options['fields']['field_p_erating']['table'] = 'field_data_field_p_erating';
  $handler->display->display_options['fields']['field_p_erating']['field'] = 'field_p_erating';
  $handler->display->display_options['fields']['field_p_erating']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['field_p_erating']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['field_p_erating']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['field_p_erating']['alter']['external'] = 0;
  $handler->display->display_options['fields']['field_p_erating']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['field_p_erating']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['field_p_erating']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['field_p_erating']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['field_p_erating']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['field_p_erating']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['field_p_erating']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['field_p_erating']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['field_p_erating']['alter']['html'] = 0;
  $handler->display->display_options['fields']['field_p_erating']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['field_p_erating']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['field_p_erating']['hide_empty'] = 1;
  $handler->display->display_options['fields']['field_p_erating']['empty_zero'] = 0;
  $handler->display->display_options['fields']['field_p_erating']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['field_p_erating']['type'] = 'editable';
  $handler->display->display_options['fields']['field_p_erating']['settings'] = array(
    'click_to_edit' => 0,
    'empty_text' => '',
    'fallback_format' => 'number_integer',
    'fallback_settings' => array(
      'thousand_separator' => '',
      'prefix_suffix' => 1,
    ),
  );
  $handler->display->display_options['fields']['field_p_erating']['field_api_classes'] = 0;
  /* Field: Content: Show in block */
  $handler->display->display_options['fields']['field_show_in_block']['id'] = 'field_show_in_block';
  $handler->display->display_options['fields']['field_show_in_block']['table'] = 'field_data_field_show_in_block';
  $handler->display->display_options['fields']['field_show_in_block']['field'] = 'field_show_in_block';
  $handler->display->display_options['fields']['field_show_in_block']['label'] = 'Show in block (A)';
  $handler->display->display_options['fields']['field_show_in_block']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['field_show_in_block']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['field_show_in_block']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['field_show_in_block']['alter']['external'] = 0;
  $handler->display->display_options['fields']['field_show_in_block']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['field_show_in_block']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['field_show_in_block']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['field_show_in_block']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['field_show_in_block']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['field_show_in_block']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['field_show_in_block']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['field_show_in_block']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['field_show_in_block']['alter']['html'] = 0;
  $handler->display->display_options['fields']['field_show_in_block']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['field_show_in_block']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['field_show_in_block']['hide_empty'] = 1;
  $handler->display->display_options['fields']['field_show_in_block']['empty_zero'] = 0;
  $handler->display->display_options['fields']['field_show_in_block']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['field_show_in_block']['type'] = 'editable';
  $handler->display->display_options['fields']['field_show_in_block']['settings'] = array(
    'click_to_edit' => 0,
    'empty_text' => '',
    'fallback_format' => 'list_default',
  );
  $handler->display->display_options['fields']['field_show_in_block']['field_api_classes'] = 0;
  /* Field: Node: Edit link */
  $handler->display->display_options['fields']['edit_node']['id'] = 'edit_node';
  $handler->display->display_options['fields']['edit_node']['table'] = 'views_entity_node';
  $handler->display->display_options['fields']['edit_node']['field'] = 'edit_node';
  $handler->display->display_options['fields']['edit_node']['label'] = 'Edit';
  $handler->display->display_options['fields']['edit_node']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['edit_node']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['edit_node']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['edit_node']['alter']['external'] = 0;
  $handler->display->display_options['fields']['edit_node']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['edit_node']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['edit_node']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['edit_node']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['edit_node']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['edit_node']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['edit_node']['alter']['html'] = 0;
  $handler->display->display_options['fields']['edit_node']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['edit_node']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['edit_node']['hide_empty'] = 0;
  $handler->display->display_options['fields']['edit_node']['empty_zero'] = 0;
  /* Sort criterion: Content: Updated date */
  $handler->display->display_options['sorts']['changed']['id'] = 'changed';
  $handler->display->display_options['sorts']['changed']['table'] = 'node';
  $handler->display->display_options['sorts']['changed']['field'] = 'changed';
  $handler->display->display_options['sorts']['changed']['order'] = 'DESC';
  /* Filter criterion: Content: Title */
  $handler->display->display_options['filters']['title']['id'] = 'title';
  $handler->display->display_options['filters']['title']['table'] = 'node';
  $handler->display->display_options['filters']['title']['field'] = 'title';
  $handler->display->display_options['filters']['title']['operator'] = 'contains';
  $handler->display->display_options['filters']['title']['group'] = 0;
  $handler->display->display_options['filters']['title']['exposed'] = TRUE;
  $handler->display->display_options['filters']['title']['expose']['operator_id'] = 'title_op';
  $handler->display->display_options['filters']['title']['expose']['label'] = 'Title contains';
  $handler->display->display_options['filters']['title']['expose']['operator'] = 'title_op';
  $handler->display->display_options['filters']['title']['expose']['identifier'] = 'title';
  $handler->display->display_options['filters']['title']['expose']['multiple'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['group'] = 0;
  $handler->display->display_options['filters']['type']['exposed'] = TRUE;
  $handler->display->display_options['filters']['type']['expose']['operator_id'] = 'type_op';
  $handler->display->display_options['filters']['type']['expose']['label'] = 'Node: Type';
  $handler->display->display_options['filters']['type']['expose']['operator'] = 'type_op';
  $handler->display->display_options['filters']['type']['expose']['identifier'] = 'type';
  $handler->display->display_options['filters']['type']['expose']['reduce'] = 0;
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 'All';
  $handler->display->display_options['filters']['status']['group'] = 0;
  $handler->display->display_options['filters']['status']['exposed'] = TRUE;
  $handler->display->display_options['filters']['status']['expose']['operator_id'] = '';
  $handler->display->display_options['filters']['status']['expose']['label'] = 'Published';
  $handler->display->display_options['filters']['status']['expose']['use_operator'] = FALSE;
  $handler->display->display_options['filters']['status']['expose']['operator'] = 'status_op';
  $handler->display->display_options['filters']['status']['expose']['identifier'] = 'status';
  $handler->display->display_options['filters']['status']['expose']['multiple'] = FALSE;
  /* Filter criterion: Content: Service Types Available (field_p_types) */
  $handler->display->display_options['filters']['field_p_types_value']['id'] = 'field_p_types_value';
  $handler->display->display_options['filters']['field_p_types_value']['table'] = 'field_data_field_p_types';
  $handler->display->display_options['filters']['field_p_types_value']['field'] = 'field_p_types_value';
  $handler->display->display_options['filters']['field_p_types_value']['value'] = array(
    'residential' => 'residential',
    'business' => 'business',
  );
  $handler->display->display_options['filters']['field_p_types_value']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_p_types_value']['expose']['operator_id'] = 'field_p_types_value_op';
  $handler->display->display_options['filters']['field_p_types_value']['expose']['label'] = 'Service Type (providers only)';
  $handler->display->display_options['filters']['field_p_types_value']['expose']['operator'] = 'field_p_types_value_op';
  $handler->display->display_options['filters']['field_p_types_value']['expose']['identifier'] = 'service';
  $handler->display->display_options['filters']['field_p_types_value']['expose']['reduce'] = 0;

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page');
  $handler->display->display_options['path'] = 'admin/content-gv';

  $views[$view->name] = $view;
  
  
  
  
  
  
  
  
  
  
  
  /* Content to approve */
  /* ---------------------------------------------------------------- */
  
  $view = new view;
  $view->name = 'reviews_to_approve';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'Content to approve';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Reviews to approve';
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['access']['perm'] = 'administer nodes';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['query']['options']['query_comment'] = FALSE;
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '10';
  $handler->display->display_options['style_plugin'] = 'table';
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['title']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['title']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = 0;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = 0;
  $handler->display->display_options['fields']['title']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['title']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['title']['alter']['html'] = 0;
  $handler->display->display_options['fields']['title']['hide_empty'] = 0;
  $handler->display->display_options['fields']['title']['empty_zero'] = 0;
  $handler->display->display_options['fields']['title']['link_to_node'] = 1;
  /* Field: Content: Your Email */
  $handler->display->display_options['fields']['field_r_email']['id'] = 'field_r_email';
  $handler->display->display_options['fields']['field_r_email']['table'] = 'field_data_field_r_email';
  $handler->display->display_options['fields']['field_r_email']['field'] = 'field_r_email';
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'review' => 'review',
  );

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page');
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'table';
  $handler->display->display_options['style_options']['columns'] = array(
    'title' => 'title',
    'uid' => 'uid',
    'field_r_fname' => 'field_r_fname',
    'field_r_lname' => 'field_r_lname',
    'field_r_approvecode' => 'field_r_approvecode',
    'field_r_oprovider' => 'field_r_oprovider',
    'field_ref_provider' => 'field_ref_provider',
    'php_3' => 'php_3',
    'php_1' => 'php_1',
    'field_r_email' => 'field_r_email',
    'php' => 'php',
    'php_2' => 'php_2',
    'created' => 'created',
  );
  $handler->display->display_options['style_options']['default'] = 'created';
  $handler->display->display_options['style_options']['info'] = array(
    'title' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'uid' => array(
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'field_r_fname' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'field_r_lname' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'field_r_approvecode' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'field_r_oprovider' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'field_ref_provider' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php_3' => array(
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php_1' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'field_r_email' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php' => array(
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php_2' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'created' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
  );
  $handler->display->display_options['style_options']['override'] = 1;
  $handler->display->display_options['style_options']['sticky'] = 0;
  $handler->display->display_options['style_options']['empty_table'] = 0;
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = 'Review title (may be temporary)';
  $handler->display->display_options['fields']['title']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['title']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['title']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['title']['alter']['external'] = 0;
  $handler->display->display_options['fields']['title']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['title']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['title']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = 0;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = 0;
  $handler->display->display_options['fields']['title']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['title']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['title']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['title']['alter']['html'] = 0;
  $handler->display->display_options['fields']['title']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['title']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['title']['hide_empty'] = 0;
  $handler->display->display_options['fields']['title']['empty_zero'] = 0;
  $handler->display->display_options['fields']['title']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['title']['link_to_node'] = 1;
  /* Field: Content: Author uid */
  $handler->display->display_options['fields']['uid']['id'] = 'uid';
  $handler->display->display_options['fields']['uid']['table'] = 'node';
  $handler->display->display_options['fields']['uid']['field'] = 'uid';
  $handler->display->display_options['fields']['uid']['exclude'] = TRUE;
  $handler->display->display_options['fields']['uid']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['uid']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['uid']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['uid']['alter']['external'] = 0;
  $handler->display->display_options['fields']['uid']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['uid']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['uid']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['uid']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['uid']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['uid']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['uid']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['uid']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['uid']['alter']['html'] = 0;
  $handler->display->display_options['fields']['uid']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['uid']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['uid']['hide_empty'] = 0;
  $handler->display->display_options['fields']['uid']['empty_zero'] = 0;
  $handler->display->display_options['fields']['uid']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['uid']['link_to_user'] = 0;
  /* Field: Content: First Name */
  $handler->display->display_options['fields']['field_r_fname']['id'] = 'field_r_fname';
  $handler->display->display_options['fields']['field_r_fname']['table'] = 'field_data_field_r_fname';
  $handler->display->display_options['fields']['field_r_fname']['field'] = 'field_r_fname';
  $handler->display->display_options['fields']['field_r_fname']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_r_fname']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['field_r_fname']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['field_r_fname']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['field_r_fname']['alter']['external'] = 0;
  $handler->display->display_options['fields']['field_r_fname']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['field_r_fname']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['field_r_fname']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['field_r_fname']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['field_r_fname']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['field_r_fname']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['field_r_fname']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['field_r_fname']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['field_r_fname']['alter']['html'] = 0;
  $handler->display->display_options['fields']['field_r_fname']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['field_r_fname']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['field_r_fname']['hide_empty'] = 0;
  $handler->display->display_options['fields']['field_r_fname']['empty_zero'] = 0;
  $handler->display->display_options['fields']['field_r_fname']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['field_r_fname']['field_api_classes'] = 0;
  /* Field: Content: Last Name */
  $handler->display->display_options['fields']['field_r_lname']['id'] = 'field_r_lname';
  $handler->display->display_options['fields']['field_r_lname']['table'] = 'field_data_field_r_lname';
  $handler->display->display_options['fields']['field_r_lname']['field'] = 'field_r_lname';
  $handler->display->display_options['fields']['field_r_lname']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_r_lname']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['field_r_lname']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['field_r_lname']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['field_r_lname']['alter']['external'] = 0;
  $handler->display->display_options['fields']['field_r_lname']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['field_r_lname']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['field_r_lname']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['field_r_lname']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['field_r_lname']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['field_r_lname']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['field_r_lname']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['field_r_lname']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['field_r_lname']['alter']['html'] = 0;
  $handler->display->display_options['fields']['field_r_lname']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['field_r_lname']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['field_r_lname']['hide_empty'] = 0;
  $handler->display->display_options['fields']['field_r_lname']['empty_zero'] = 0;
  $handler->display->display_options['fields']['field_r_lname']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['field_r_lname']['field_api_classes'] = 0;
  /* Field: Content: Email approve code */
  $handler->display->display_options['fields']['field_r_approvecode']['id'] = 'field_r_approvecode';
  $handler->display->display_options['fields']['field_r_approvecode']['table'] = 'field_data_field_r_approvecode';
  $handler->display->display_options['fields']['field_r_approvecode']['field'] = 'field_r_approvecode';
  $handler->display->display_options['fields']['field_r_approvecode']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_r_approvecode']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['field_r_approvecode']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['field_r_approvecode']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['field_r_approvecode']['alter']['external'] = 0;
  $handler->display->display_options['fields']['field_r_approvecode']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['field_r_approvecode']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['field_r_approvecode']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['field_r_approvecode']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['field_r_approvecode']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['field_r_approvecode']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['field_r_approvecode']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['field_r_approvecode']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['field_r_approvecode']['alter']['html'] = 0;
  $handler->display->display_options['fields']['field_r_approvecode']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['field_r_approvecode']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['field_r_approvecode']['hide_empty'] = 0;
  $handler->display->display_options['fields']['field_r_approvecode']['empty_zero'] = 0;
  $handler->display->display_options['fields']['field_r_approvecode']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['field_r_approvecode']['field_api_classes'] = 0;
  /* Field: Content: If Selected "OTHER SP" above, enter here */
  $handler->display->display_options['fields']['field_r_oprovider']['id'] = 'field_r_oprovider';
  $handler->display->display_options['fields']['field_r_oprovider']['table'] = 'field_data_field_r_oprovider';
  $handler->display->display_options['fields']['field_r_oprovider']['field'] = 'field_r_oprovider';
  $handler->display->display_options['fields']['field_r_oprovider']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_r_oprovider']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['field_r_oprovider']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['field_r_oprovider']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['field_r_oprovider']['alter']['external'] = 0;
  $handler->display->display_options['fields']['field_r_oprovider']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['field_r_oprovider']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['field_r_oprovider']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['field_r_oprovider']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['field_r_oprovider']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['field_r_oprovider']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['field_r_oprovider']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['field_r_oprovider']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['field_r_oprovider']['alter']['html'] = 0;
  $handler->display->display_options['fields']['field_r_oprovider']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['field_r_oprovider']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['field_r_oprovider']['hide_empty'] = 0;
  $handler->display->display_options['fields']['field_r_oprovider']['empty_zero'] = 0;
  $handler->display->display_options['fields']['field_r_oprovider']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['field_r_oprovider']['field_api_classes'] = 0;
  /* Field: Content: Your VoIP Service Provider */
  $handler->display->display_options['fields']['field_ref_provider']['id'] = 'field_ref_provider';
  $handler->display->display_options['fields']['field_ref_provider']['table'] = 'field_data_field_ref_provider';
  $handler->display->display_options['fields']['field_ref_provider']['field'] = 'field_ref_provider';
  $handler->display->display_options['fields']['field_ref_provider']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_ref_provider']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['field_ref_provider']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['field_ref_provider']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['field_ref_provider']['alter']['external'] = 0;
  $handler->display->display_options['fields']['field_ref_provider']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['field_ref_provider']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['field_ref_provider']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['field_ref_provider']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['field_ref_provider']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['field_ref_provider']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['field_ref_provider']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['field_ref_provider']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['field_ref_provider']['alter']['html'] = 0;
  $handler->display->display_options['fields']['field_ref_provider']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['field_ref_provider']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['field_ref_provider']['hide_empty'] = 0;
  $handler->display->display_options['fields']['field_ref_provider']['empty_zero'] = 0;
  $handler->display->display_options['fields']['field_ref_provider']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['field_ref_provider']['settings'] = array(
    'link' => 0,
  );
  $handler->display->display_options['fields']['field_ref_provider']['field_api_classes'] = 0;
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_3']['id'] = 'php_3';
  $handler->display->display_options['fields']['php_3']['table'] = 'views';
  $handler->display->display_options['fields']['php_3']['field'] = 'php';
  $handler->display->display_options['fields']['php_3']['label'] = 'For Provider';
  $handler->display->display_options['fields']['php_3']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_3']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_3']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_3']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php_3']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_3']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_3']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_3']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_3']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_3']['php_output'] = '<?php
  if ($data->field_field_r_oprovider[0][\'raw\'][\'value\']) {
    echo $data->field_field_r_oprovider[0][\'raw\'][\'value\'];
  }
  else {
    echo l($data->field_field_ref_provider[0][\'raw\'][\'entity\']->title, \'node/\' . $data->field_field_ref_provider[0][\'raw\'][\'entity\']->nid);
  }
  ?>';
  $handler->display->display_options['fields']['php_3']['use_php_click_sortable'] = '0';
  $handler->display->display_options['fields']['php_3']['php_click_sortable'] = '';
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_1']['id'] = 'php_1';
  $handler->display->display_options['fields']['php_1']['table'] = 'views';
  $handler->display->display_options['fields']['php_1']['field'] = 'php';
  $handler->display->display_options['fields']['php_1']['label'] = 'Author';
  $handler->display->display_options['fields']['php_1']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_1']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_1']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_1']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php_1']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_1']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_1']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_1']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_1']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_1']['php_output'] = '<?php
  $out = $data->field_field_r_fname[0][\'raw\'][\'value\'] . \' \' . $data->field_field_r_lname[0][\'raw\'][\'value\'];
  if (!$data->node_uid) {
    echo $out . \' \' . \'( guest )\';
  }
  else {
    echo l($out, \'user/\' . $data->node_uid);
  }
  ?>';
  $handler->display->display_options['fields']['php_1']['use_php_click_sortable'] = '2';
  $handler->display->display_options['fields']['php_1']['php_click_sortable'] = '';
  /* Field: Content: Your Email */
  $handler->display->display_options['fields']['field_r_email']['id'] = 'field_r_email';
  $handler->display->display_options['fields']['field_r_email']['table'] = 'field_data_field_r_email';
  $handler->display->display_options['fields']['field_r_email']['field'] = 'field_r_email';
  $handler->display->display_options['fields']['field_r_email']['label'] = 'Author\'s e-mail';
  $handler->display->display_options['fields']['field_r_email']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['field_r_email']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['field_r_email']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['field_r_email']['alter']['external'] = 0;
  $handler->display->display_options['fields']['field_r_email']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['field_r_email']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['field_r_email']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['field_r_email']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['field_r_email']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['field_r_email']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['field_r_email']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['field_r_email']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['field_r_email']['alter']['html'] = 0;
  $handler->display->display_options['fields']['field_r_email']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['field_r_email']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['field_r_email']['hide_empty'] = 0;
  $handler->display->display_options['fields']['field_r_email']['empty_zero'] = 0;
  $handler->display->display_options['fields']['field_r_email']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['field_r_email']['field_api_classes'] = 0;
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php']['id'] = 'php';
  $handler->display->display_options['fields']['php']['table'] = 'views';
  $handler->display->display_options['fields']['php']['field'] = 'php';
  $handler->display->display_options['fields']['php']['label'] = 'Actions';
  $handler->display->display_options['fields']['php']['exclude'] = TRUE;
  $handler->display->display_options['fields']['php']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php']['php_output'] = '<a href="<?php echo \'/approve/review/\' . $data->nid . \'?destination=approve/reviews\'; ?>"><?php echo t(\'Approve and Publish\'); ?></a>';
  $handler->display->display_options['fields']['php']['use_php_click_sortable'] = '0';
  $handler->display->display_options['fields']['php']['php_click_sortable'] = '';
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_2']['id'] = 'php_2';
  $handler->display->display_options['fields']['php_2']['table'] = 'views';
  $handler->display->display_options['fields']['php_2']['field'] = 'php';
  $handler->display->display_options['fields']['php_2']['label'] = 'Email verification status (for guests only)';
  $handler->display->display_options['fields']['php_2']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_2']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_2']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_2']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php_2']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_2']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_2']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_2']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_2']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_2']['php_output'] = '<?php
  if (!$data->node_uid) {
    if ($data->field_field_r_approvecode[0][\'raw\'][\'value\']) {
      echo t(\'Not verified email\');
    }
  }
  ?>';
  $handler->display->display_options['fields']['php_2']['use_php_click_sortable'] = '2';
  $handler->display->display_options['fields']['php_2']['php_click_sortable'] = '';
  /* Field: Content: Post date */
  $handler->display->display_options['fields']['created']['id'] = 'created';
  $handler->display->display_options['fields']['created']['table'] = 'node';
  $handler->display->display_options['fields']['created']['field'] = 'created';
  $handler->display->display_options['fields']['created']['label'] = 'Submit date';
  $handler->display->display_options['fields']['created']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['created']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['created']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['created']['alter']['external'] = 0;
  $handler->display->display_options['fields']['created']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['created']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['created']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['created']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['created']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['created']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['created']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['created']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['created']['alter']['html'] = 0;
  $handler->display->display_options['fields']['created']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['created']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['created']['hide_empty'] = 0;
  $handler->display->display_options['fields']['created']['empty_zero'] = 0;
  $handler->display->display_options['fields']['created']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['created']['date_format'] = 'medium';
  $handler->display->display_options['defaults']['filters'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'review' => 'review',
  );
  /* Filter criterion: Content: Is not approved (field_r_notapproved) */
  $handler->display->display_options['filters']['field_r_notapproved_value']['id'] = 'field_r_notapproved_value';
  $handler->display->display_options['filters']['field_r_notapproved_value']['table'] = 'field_data_field_r_notapproved';
  $handler->display->display_options['filters']['field_r_notapproved_value']['field'] = 'field_r_notapproved_value';
  $handler->display->display_options['filters']['field_r_notapproved_value']['value']['value'] = '1';
  $handler->display->display_options['path'] = 'approve/reviews';

  $views[$view->name] = $view;
  
  
  
  
  
  
  
  
  
  
  
  
  /* News */
  /* ---------------------------------------------------------------- */
  
  $view = new view;
  $view->name = 'news';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'News';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Latest News Articles';
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['query']['options']['query_comment'] = FALSE;
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '3';
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['row_plugin'] = 'node';
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['title']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['title']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = 0;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = 0;
  $handler->display->display_options['fields']['title']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['title']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['title']['alter']['html'] = 0;
  $handler->display->display_options['fields']['title']['hide_empty'] = 0;
  $handler->display->display_options['fields']['title']['empty_zero'] = 0;
  $handler->display->display_options['fields']['title']['link_to_node'] = 1;
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'news_post' => 'news_post',
  );

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page');
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '8';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['pager']['options']['id'] = '0';
  $handler->display->display_options['pager']['options']['expose']['items_per_page_options_all'] = 0;
  $handler->display->display_options['defaults']['arguments'] = FALSE;
  /* Contextual filter: Content: Topics (field_topics) */
  $handler->display->display_options['arguments']['field_topics_tid']['id'] = 'field_topics_tid';
  $handler->display->display_options['arguments']['field_topics_tid']['table'] = 'field_data_field_topics';
  $handler->display->display_options['arguments']['field_topics_tid']['field'] = 'field_topics_tid';
  $handler->display->display_options['arguments']['field_topics_tid']['title_enable'] = 1;
  $handler->display->display_options['arguments']['field_topics_tid']['title'] = 'News, labeled as %1';
  $handler->display->display_options['arguments']['field_topics_tid']['default_argument_type'] = 'fixed';
  $handler->display->display_options['arguments']['field_topics_tid']['default_argument_skip_url'] = 1;
  $handler->display->display_options['arguments']['field_topics_tid']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['field_topics_tid']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['field_topics_tid']['summary_options']['items_per_page'] = '25';
  $handler->display->display_options['arguments']['field_topics_tid']['specify_validation'] = 1;
  $handler->display->display_options['arguments']['field_topics_tid']['validate']['type'] = 'taxonomy_term';
  $handler->display->display_options['arguments']['field_topics_tid']['validate_options']['vocabularies'] = array(
    'topics' => 'topics',
  );
  $handler->display->display_options['arguments']['field_topics_tid']['validate_options']['type'] = 'convert';
  $handler->display->display_options['arguments']['field_topics_tid']['validate_options']['transform'] = '1';
  $handler->display->display_options['arguments']['field_topics_tid']['break_phrase'] = 0;
  $handler->display->display_options['arguments']['field_topics_tid']['not'] = 0;
  $handler->display->display_options['path'] = 'news';

  /* Display: Block */
  $handler = $view->new_display('block', 'Block', 'block');
  $handler->display->display_options['defaults']['use_more'] = FALSE;
  $handler->display->display_options['use_more'] = TRUE;
  $handler->display->display_options['use_more_always'] = TRUE;
  $handler->display->display_options['use_more_text'] = 'View All >>';
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'some';
  $handler->display->display_options['pager']['options']['items_per_page'] = '3';
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'fields';
  $handler->display->display_options['defaults']['row_options'] = FALSE;

  /* Display: Page - Filtered by topics */
  $handler = $view->new_display('page', 'Page - Filtered by topics', 'page_by_tag');
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '8';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['pager']['options']['id'] = '0';
  $handler->display->display_options['pager']['options']['expose']['items_per_page_options_all'] = 0;
  $handler->display->display_options['defaults']['empty'] = FALSE;
  /* No results behavior: Global: Text area */
  $handler->display->display_options['empty']['area']['id'] = 'area';
  $handler->display->display_options['empty']['area']['table'] = 'views';
  $handler->display->display_options['empty']['area']['field'] = 'area';
  $handler->display->display_options['empty']['area']['label'] = 'No results for the requested topic';
  $handler->display->display_options['empty']['area']['empty'] = FALSE;
  $handler->display->display_options['empty']['area']['content'] = 'No results for the requested topic...';
  $handler->display->display_options['empty']['area']['format'] = 'plain_text';
  $handler->display->display_options['empty']['area']['tokenize'] = 0;
  $handler->display->display_options['defaults']['arguments'] = FALSE;
  /* Contextual filter: Content: Topics (field_topics) */
  $handler->display->display_options['arguments']['field_topics_tid']['id'] = 'field_topics_tid';
  $handler->display->display_options['arguments']['field_topics_tid']['table'] = 'field_data_field_topics';
  $handler->display->display_options['arguments']['field_topics_tid']['field'] = 'field_topics_tid';
  $handler->display->display_options['arguments']['field_topics_tid']['default_action'] = 'empty';
  $handler->display->display_options['arguments']['field_topics_tid']['title_enable'] = 1;
  $handler->display->display_options['arguments']['field_topics_tid']['title'] = 'News, tagged with "%1"';
  $handler->display->display_options['arguments']['field_topics_tid']['default_argument_type'] = 'php';
  $handler->display->display_options['arguments']['field_topics_tid']['default_argument_options']['code'] = 'drupal_goto(\'news\');';
  $handler->display->display_options['arguments']['field_topics_tid']['default_argument_skip_url'] = 0;
  $handler->display->display_options['arguments']['field_topics_tid']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['field_topics_tid']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['field_topics_tid']['summary_options']['items_per_page'] = '25';
  $handler->display->display_options['arguments']['field_topics_tid']['specify_validation'] = 1;
  $handler->display->display_options['arguments']['field_topics_tid']['validate']['type'] = 'taxonomy_term';
  $handler->display->display_options['arguments']['field_topics_tid']['validate_options']['vocabularies'] = array(
    'topics' => 'topics',
  );
  $handler->display->display_options['arguments']['field_topics_tid']['validate_options']['type'] = 'convert';
  $handler->display->display_options['arguments']['field_topics_tid']['validate_options']['transform'] = '1';
  $handler->display->display_options['arguments']['field_topics_tid']['break_phrase'] = 0;
  $handler->display->display_options['arguments']['field_topics_tid']['not'] = 0;
  $handler->display->display_options['path'] = 'news/tags/%';
  
  $views[$view->name] = $view;
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  /* Providers */
  /* ---------------------------------------------------------------- */
  
  $view = new view;
  $view->name = 'providers';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'Providers';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Top pick residential providers ';
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['query']['options']['distinct'] = TRUE;
  $handler->display->display_options['query']['options']['query_comment'] = FALSE;
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '3';
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['row_plugin'] = 'node';
  /* Relationship: Content: Vote results */
  $handler->display->display_options['relationships']['votingapi_cache']['id'] = 'votingapi_cache';
  $handler->display->display_options['relationships']['votingapi_cache']['table'] = 'node';
  $handler->display->display_options['relationships']['votingapi_cache']['field'] = 'votingapi_cache';
  $handler->display->display_options['relationships']['votingapi_cache']['label'] = 'Vote results Overall Percents';
  $handler->display->display_options['relationships']['votingapi_cache']['required'] = 0;
  $handler->display->display_options['relationships']['votingapi_cache']['votingapi'] = array(
    'value_type' => 'percent',
    'tag' => 'overall',
    'function' => 'average',
  );
  /* Relationship: Content: Vote results */
  $handler->display->display_options['relationships']['votingapi_cache_1']['id'] = 'votingapi_cache_1';
  $handler->display->display_options['relationships']['votingapi_cache_1']['table'] = 'node';
  $handler->display->display_options['relationships']['votingapi_cache_1']['field'] = 'votingapi_cache';
  $handler->display->display_options['relationships']['votingapi_cache_1']['label'] = 'Vote results Overall Count';
  $handler->display->display_options['relationships']['votingapi_cache_1']['required'] = 0;
  $handler->display->display_options['relationships']['votingapi_cache_1']['votingapi'] = array(
    'value_type' => 'percent',
    'tag' => 'overall',
    'function' => 'count',
  );
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['title']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['title']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = 0;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = 0;
  $handler->display->display_options['fields']['title']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['title']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['title']['alter']['html'] = 0;
  $handler->display->display_options['fields']['title']['hide_empty'] = 0;
  $handler->display->display_options['fields']['title']['empty_zero'] = 0;
  $handler->display->display_options['fields']['title']['link_to_node'] = 1;
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'provider' => 'provider',
  );

  /* Display: Page - Providers directory */
  $handler = $view->new_display('page', 'Page - Providers directory', 'page');
  $handler->display->display_options['defaults']['title'] = FALSE;
  $handler->display->display_options['title'] = 'Providers';
  $handler->display->display_options['enabled'] = FALSE;
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '8';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['pager']['options']['id'] = '0';
  $handler->display->display_options['pager']['options']['expose']['items_per_page_options_all'] = 0;
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'table';
  $handler->display->display_options['style_options']['columns'] = array(
    'title' => 'title',
    'field_p_data' => 'field_p_data',
    'field_p_logo' => 'field_p_logo',
    'body' => 'body',
    'php_1' => 'php_1',
    'php_2' => 'php_2',
    'php' => 'php',
    'php_3' => 'php_3',
    'value' => 'value',
    'value_1' => 'value_1',
    'php_4' => 'php_4',
  );
  $handler->display->display_options['style_options']['default'] = 'title';
  $handler->display->display_options['style_options']['info'] = array(
    'title' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'field_p_data' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'field_p_logo' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'body' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php_1' => array(
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php_2' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php_3' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'value' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'value_1' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php_4' => array(
      'sortable' => 1,
      'default_sort_order' => 'desc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
  );
  $handler->display->display_options['style_options']['override'] = 1;
  $handler->display->display_options['style_options']['sticky'] = 1;
  $handler->display->display_options['style_options']['empty_table'] = 0;
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['header'] = FALSE;
  $handler->display->display_options['defaults']['relationships'] = FALSE;
  /* Relationship: Content: Vote results */
  $handler->display->display_options['relationships']['votingapi_cache']['id'] = 'votingapi_cache';
  $handler->display->display_options['relationships']['votingapi_cache']['table'] = 'node';
  $handler->display->display_options['relationships']['votingapi_cache']['field'] = 'votingapi_cache';
  $handler->display->display_options['relationships']['votingapi_cache']['label'] = 'Vote results features';
  $handler->display->display_options['relationships']['votingapi_cache']['required'] = 0;
  $handler->display->display_options['relationships']['votingapi_cache']['votingapi'] = array(
    'value_type' => 'percent',
    'tag' => 'features',
    'function' => 'average',
  );
  /* Relationship: Content: Vote results */
  $handler->display->display_options['relationships']['votingapi_cache_1']['id'] = 'votingapi_cache_1';
  $handler->display->display_options['relationships']['votingapi_cache_1']['table'] = 'node';
  $handler->display->display_options['relationships']['votingapi_cache_1']['field'] = 'votingapi_cache';
  $handler->display->display_options['relationships']['votingapi_cache_1']['label'] = 'Vote results features count';
  $handler->display->display_options['relationships']['votingapi_cache_1']['required'] = 0;
  $handler->display->display_options['relationships']['votingapi_cache_1']['votingapi'] = array(
    'value_type' => 'percent',
    'tag' => 'features',
    'function' => 'count',
  );
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = 'Provider';
  $handler->display->display_options['fields']['title']['exclude'] = TRUE;
  $handler->display->display_options['fields']['title']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['title']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['title']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['title']['alter']['external'] = 0;
  $handler->display->display_options['fields']['title']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['title']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['title']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = 0;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = 0;
  $handler->display->display_options['fields']['title']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['title']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['title']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['title']['alter']['html'] = 0;
  $handler->display->display_options['fields']['title']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['title']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['title']['hide_empty'] = 0;
  $handler->display->display_options['fields']['title']['empty_zero'] = 0;
  $handler->display->display_options['fields']['title']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['title']['link_to_node'] = 1;
  /* Field: Content: Logo */
  $handler->display->display_options['fields']['field_p_logo']['id'] = 'field_p_logo';
  $handler->display->display_options['fields']['field_p_logo']['table'] = 'field_data_field_p_logo';
  $handler->display->display_options['fields']['field_p_logo']['field'] = 'field_p_logo';
  $handler->display->display_options['fields']['field_p_logo']['label'] = 'Provider';
  $handler->display->display_options['fields']['field_p_logo']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['text'] = '[title]';
  $handler->display->display_options['fields']['field_p_logo']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['external'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['html'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['empty'] = '[title]';
  $handler->display->display_options['fields']['field_p_logo']['hide_empty'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['empty_zero'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['hide_alter_empty'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['click_sort_column'] = 'title';
  $handler->display->display_options['fields']['field_p_logo']['settings'] = array(
    'image_style' => 'thumbnail',
    'image_link' => 'content',
  );
  $handler->display->display_options['fields']['field_p_logo']['field_api_classes'] = 0;
  /* Field: Content: Body */
  $handler->display->display_options['fields']['body']['id'] = 'body';
  $handler->display->display_options['fields']['body']['table'] = 'field_data_body';
  $handler->display->display_options['fields']['body']['field'] = 'body';
  $handler->display->display_options['fields']['body']['label'] = 'Description';
  $handler->display->display_options['fields']['body']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['body']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['body']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['body']['alter']['external'] = 0;
  $handler->display->display_options['fields']['body']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['body']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['body']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['body']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['body']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['body']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['body']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['body']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['body']['alter']['html'] = 0;
  $handler->display->display_options['fields']['body']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['body']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['body']['hide_empty'] = 0;
  $handler->display->display_options['fields']['body']['empty_zero'] = 0;
  $handler->display->display_options['fields']['body']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['body']['type'] = 'text_summary_or_trimmed';
  $handler->display->display_options['fields']['body']['settings'] = array(
    'trim_length' => '60',
  );
  $handler->display->display_options['fields']['body']['field_api_classes'] = 0;
  /* Field: Content: Provider Other Data */
  $handler->display->display_options['fields']['field_p_data']['id'] = 'field_p_data';
  $handler->display->display_options['fields']['field_p_data']['table'] = 'field_data_field_p_data';
  $handler->display->display_options['fields']['field_p_data']['field'] = 'field_p_data';
  $handler->display->display_options['fields']['field_p_data']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_p_data']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['field_p_data']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['field_p_data']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['field_p_data']['alter']['external'] = 0;
  $handler->display->display_options['fields']['field_p_data']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['field_p_data']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['field_p_data']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['field_p_data']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['field_p_data']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['field_p_data']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['field_p_data']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['field_p_data']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['field_p_data']['alter']['html'] = 0;
  $handler->display->display_options['fields']['field_p_data']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['field_p_data']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['field_p_data']['hide_empty'] = 0;
  $handler->display->display_options['fields']['field_p_data']['empty_zero'] = 0;
  $handler->display->display_options['fields']['field_p_data']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['field_p_data']['field_api_classes'] = 0;
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_5']['id'] = 'php_5';
  $handler->display->display_options['fields']['php_5']['table'] = 'views';
  $handler->display->display_options['fields']['php_5']['field'] = 'php';
  $handler->display->display_options['fields']['php_5']['label'] = 'Service Types';
  $handler->display->display_options['fields']['php_5']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_5']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_5']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_5']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php_5']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_5']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_5']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_5']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_5']['use_php_setup'] = 1;
  $handler->display->display_options['fields']['php_5']['php_output'] = '<?php 
  echo wdg_misc_getProviderData_fromView(\'service_types\', array(\'data\' => $data, \'exposed_raw_input\' => $handler->view->exposed_raw_input));
  ?>';
  $handler->display->display_options['fields']['php_5']['use_php_click_sortable'] = '0';
  $handler->display->display_options['fields']['php_5']['php_click_sortable'] = '';
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_1']['id'] = 'php_1';
  $handler->display->display_options['fields']['php_1']['table'] = 'views';
  $handler->display->display_options['fields']['php_1']['field'] = 'php';
  $handler->display->display_options['fields']['php_1']['label'] = 'Plan';
  $handler->display->display_options['fields']['php_1']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_1']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_1']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_1']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php_1']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_1']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_1']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_1']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_1']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_1']['php_output'] = '<?php 
  echo wdg_misc_getProviderData_fromView(\'plan\', array(\'data\' => $data, \'exposed_raw_input\' => $handler->view->exposed_raw_input));
  ?>';
  $handler->display->display_options['fields']['php_1']['use_php_click_sortable'] = '0';
  $handler->display->display_options['fields']['php_1']['php_click_sortable'] = '';
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_2']['id'] = 'php_2';
  $handler->display->display_options['fields']['php_2']['table'] = 'views';
  $handler->display->display_options['fields']['php_2']['field'] = 'php';
  $handler->display->display_options['fields']['php_2']['label'] = 'Long Dist.';
  $handler->display->display_options['fields']['php_2']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_2']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_2']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_2']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php_2']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_2']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_2']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_2']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_2']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_2']['php_value'] = '$value = wdg_misc_getProviderData_fromView(\'longdistance_fees\', array(\'data\' => $data, \'exposed_raw_input\' => $handler->view->exposed_raw_input));
  return $value;';
  $handler->display->display_options['fields']['php_2']['php_output'] = '<?php 
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php_2']['use_php_click_sortable'] = '5';
  $handler->display->display_options['fields']['php_2']['php_click_sortable'] = 'return 1;';
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php']['id'] = 'php';
  $handler->display->display_options['fields']['php']['table'] = 'views';
  $handler->display->display_options['fields']['php']['field'] = 'php';
  $handler->display->display_options['fields']['php']['label'] = 'Monthly Fees';
  $handler->display->display_options['fields']['php']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php']['alter']['text'] = '[php] c';
  $handler->display->display_options['fields']['php']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php']['php_value'] = '$value = wdg_misc_getProviderData_fromView(\'monthly_fees\', array(\'data\' => $data, \'exposed_raw_input\' => $handler->view->exposed_raw_input));
  return $value;';
  $handler->display->display_options['fields']['php']['php_output'] = '<?php 
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php']['use_php_click_sortable'] = '5';
  $handler->display->display_options['fields']['php']['php_click_sortable'] = 'return 1;';
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_3']['id'] = 'php_3';
  $handler->display->display_options['fields']['php_3']['table'] = 'views';
  $handler->display->display_options['fields']['php_3']['field'] = 'php';
  $handler->display->display_options['fields']['php_3']['label'] = 'Setup Fees';
  $handler->display->display_options['fields']['php_3']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_3']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_3']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_3']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php_3']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_3']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_3']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_3']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_3']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_3']['php_value'] = '$value = wdg_misc_getProviderData_fromView(\'setup_fees\', array(\'data\' => $data, \'exposed_raw_input\' => $handler->view->exposed_raw_input));
  return $value;';
  $handler->display->display_options['fields']['php_3']['php_output'] = '<?php 
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php_3']['use_php_click_sortable'] = '5';
  $handler->display->display_options['fields']['php_3']['php_click_sortable'] = 'return 1;';
  /* Field: Vote results: Value */
  $handler->display->display_options['fields']['value']['id'] = 'value';
  $handler->display->display_options['fields']['value']['table'] = 'votingapi_cache';
  $handler->display->display_options['fields']['value']['field'] = 'value';
  $handler->display->display_options['fields']['value']['relationship'] = 'votingapi_cache';
  $handler->display->display_options['fields']['value']['label'] = 'Voting result Value';
  $handler->display->display_options['fields']['value']['exclude'] = TRUE;
  $handler->display->display_options['fields']['value']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['value']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['value']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['value']['alter']['external'] = 0;
  $handler->display->display_options['fields']['value']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['value']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['value']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['value']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['value']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['value']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['value']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['value']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['value']['alter']['html'] = 0;
  $handler->display->display_options['fields']['value']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['value']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['value']['hide_empty'] = 0;
  $handler->display->display_options['fields']['value']['empty_zero'] = 0;
  $handler->display->display_options['fields']['value']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['value']['set_precision'] = 0;
  $handler->display->display_options['fields']['value']['precision'] = '0';
  $handler->display->display_options['fields']['value']['format_plural'] = 0;
  /* Field: Vote results: Value */
  $handler->display->display_options['fields']['value_1']['id'] = 'value_1';
  $handler->display->display_options['fields']['value_1']['table'] = 'votingapi_cache';
  $handler->display->display_options['fields']['value_1']['field'] = 'value';
  $handler->display->display_options['fields']['value_1']['relationship'] = 'votingapi_cache_1';
  $handler->display->display_options['fields']['value_1']['label'] = 'Votest features count';
  $handler->display->display_options['fields']['value_1']['exclude'] = TRUE;
  $handler->display->display_options['fields']['value_1']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['external'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['value_1']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['value_1']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['html'] = 0;
  $handler->display->display_options['fields']['value_1']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['value_1']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['value_1']['hide_empty'] = 0;
  $handler->display->display_options['fields']['value_1']['empty_zero'] = 0;
  $handler->display->display_options['fields']['value_1']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['value_1']['set_precision'] = 0;
  $handler->display->display_options['fields']['value_1']['precision'] = '0';
  $handler->display->display_options['fields']['value_1']['format_plural'] = 0;
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_4']['id'] = 'php_4';
  $handler->display->display_options['fields']['php_4']['table'] = 'views';
  $handler->display->display_options['fields']['php_4']['field'] = 'php';
  $handler->display->display_options['fields']['php_4']['label'] = 'User Rating';
  $handler->display->display_options['fields']['php_4']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_4']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_4']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_4']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php_4']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_4']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_4']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_4']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_4']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_4']['php_value'] = '$value = wdg_misc_getProviderData_fromView(\'user_rating\', array(\'data\' => $data, \'exposed_raw_input\' => $handler->view->exposed_raw_input));

  $static = $value;

  return $value;';
  $handler->display->display_options['fields']['php_4']['php_output'] = '<?php 
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php_4']['use_php_click_sortable'] = '6';
  $handler->display->display_options['fields']['php_4']['php_click_sortable'] = 'if ($row1->value >= $row2->value) {
    return 1;
  }
  else {
    return -1;
  }';
  $handler->display->display_options['defaults']['filters'] = FALSE;
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'provider' => 'provider',
  );
  /* Filter criterion: Content: Title */
  $handler->display->display_options['filters']['title']['id'] = 'title';
  $handler->display->display_options['filters']['title']['table'] = 'node';
  $handler->display->display_options['filters']['title']['field'] = 'title';
  $handler->display->display_options['filters']['title']['operator'] = 'contains';
  $handler->display->display_options['filters']['title']['exposed'] = TRUE;
  $handler->display->display_options['filters']['title']['expose']['operator_id'] = 'title_op';
  $handler->display->display_options['filters']['title']['expose']['label'] = 'Title';
  $handler->display->display_options['filters']['title']['expose']['operator'] = 'title_op';
  $handler->display->display_options['filters']['title']['expose']['identifier'] = 'title';
  $handler->display->display_options['filters']['title']['expose']['required'] = 0;
  $handler->display->display_options['filters']['title']['expose']['multiple'] = FALSE;
  /* Filter criterion: Content: Service Types Available (field_p_types) */
  $handler->display->display_options['filters']['field_p_types_value']['id'] = 'field_p_types_value';
  $handler->display->display_options['filters']['field_p_types_value']['table'] = 'field_data_field_p_types';
  $handler->display->display_options['filters']['field_p_types_value']['field'] = 'field_p_types_value';
  $handler->display->display_options['filters']['field_p_types_value']['value'] = array(
    'residential' => 'residential',
    'business' => 'business',
  );
  $handler->display->display_options['filters']['field_p_types_value']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_p_types_value']['expose']['operator_id'] = 'field_p_types_value_op';
  $handler->display->display_options['filters']['field_p_types_value']['expose']['label'] = 'Type';
  $handler->display->display_options['filters']['field_p_types_value']['expose']['operator'] = 'field_p_types_value_op';
  $handler->display->display_options['filters']['field_p_types_value']['expose']['identifier'] = 'type';
  $handler->display->display_options['filters']['field_p_types_value']['expose']['required'] = 1;
  $handler->display->display_options['filters']['field_p_types_value']['expose']['remember'] = 1;
  $handler->display->display_options['filters']['field_p_types_value']['expose']['reduce'] = 1;
  $handler->display->display_options['path'] = 'compare-voip-providers';

  /* Display: Block - Providers directory */
  $handler = $view->new_display('block', 'Block - Providers directory', 'block_providers_directory');
  $handler->display->display_options['defaults']['title'] = FALSE;
  $handler->display->display_options['title'] = 'Providers directory block';
  $handler->display->display_options['defaults']['use_ajax'] = FALSE;
  $handler->display->display_options['use_ajax'] = TRUE;
  $handler->display->display_options['defaults']['exposed_form'] = FALSE;
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['exposed_form']['options']['autosubmit'] = 0;
  $handler->display->display_options['exposed_form']['options']['autosubmit_hide'] = 1;
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'table';
  $handler->display->display_options['style_options']['columns'] = array(
    'title' => 'title',
    'body' => 'body',
    'field_p_logo' => 'field_p_logo',
  );
  $handler->display->display_options['style_options']['default'] = '-1';
  $handler->display->display_options['style_options']['info'] = array(
    'title' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'body' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'field_p_logo' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
  );
  $handler->display->display_options['style_options']['override'] = 1;
  $handler->display->display_options['style_options']['sticky'] = 0;
  $handler->display->display_options['style_options']['empty_table'] = 0;
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['title']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['title']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = 0;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = 0;
  $handler->display->display_options['fields']['title']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['title']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['title']['alter']['html'] = 0;
  $handler->display->display_options['fields']['title']['hide_empty'] = 0;
  $handler->display->display_options['fields']['title']['empty_zero'] = 0;
  $handler->display->display_options['fields']['title']['link_to_node'] = 1;
  /* Field: Content: Body */
  $handler->display->display_options['fields']['body']['id'] = 'body';
  $handler->display->display_options['fields']['body']['table'] = 'field_data_body';
  $handler->display->display_options['fields']['body']['field'] = 'body';
  /* Field: Content: Logo */
  $handler->display->display_options['fields']['field_p_logo']['id'] = 'field_p_logo';
  $handler->display->display_options['fields']['field_p_logo']['table'] = 'field_data_field_p_logo';
  $handler->display->display_options['fields']['field_p_logo']['field'] = 'field_p_logo';
  $handler->display->display_options['fields']['field_p_logo']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['external'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['html'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['hide_empty'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['empty_zero'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_p_logo']['settings'] = array(
    'image_style' => 'thumbnail',
    'image_link' => 'content',
  );
  $handler->display->display_options['fields']['field_p_logo']['field_api_classes'] = 0;
  $handler->display->display_options['defaults']['filters'] = FALSE;
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'provider' => 'provider',
  );
  $handler->display->display_options['block_description'] = 'Block - Providers directory';

  /* Display: Block - Top residential */
  $handler = $view->new_display('block', 'Block - Top residential', 'block_1');
  $handler->display->display_options['defaults']['title'] = FALSE;
  $handler->display->display_options['title'] = 'Compare Top Pick Residential VoIP Providers';
  $handler->display->display_options['display_description'] = 'Top residential providers';
  $handler->display->display_options['defaults']['use_more'] = FALSE;
  $handler->display->display_options['use_more'] = TRUE;
  $handler->display->display_options['use_more_always'] = TRUE;
  $handler->display->display_options['use_more_text'] = 'View All Residential VoIP Providers >>';
  $handler->display->display_options['defaults']['link_display'] = FALSE;
  $handler->display->display_options['link_display'] = 'page_p_re';
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'some';
  $handler->display->display_options['pager']['options']['items_per_page'] = '5';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'table';
  $handler->display->display_options['style_options']['columns'] = array(
    'title' => 'title',
    'field_p_logo' => 'field_p_logo',
    'php' => 'php',
    'php_3' => 'php_3',
    'php_2' => 'php_2',
    'php_1' => 'php_1',
    'value' => 'value',
    'value_1' => 'value_1',
    'php_4' => 'php_4',
    'php_5' => 'php_5',
  );
  $handler->display->display_options['style_options']['default'] = '-1';
  $handler->display->display_options['style_options']['info'] = array(
    'title' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'field_p_logo' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php' => array(
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php_3' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php_2' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php_1' => array(
      'sortable' => 0,
      'default_sort_order' => 'desc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'value' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'value_1' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php_4' => array(
      'sortable' => 0,
      'default_sort_order' => 'desc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php_5' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
  );
  $handler->display->display_options['style_options']['override'] = 1;
  $handler->display->display_options['style_options']['sticky'] = 0;
  $handler->display->display_options['style_options']['empty_table'] = 0;
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['exclude'] = TRUE;
  $handler->display->display_options['fields']['title']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['title']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['title']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['title']['alter']['external'] = 0;
  $handler->display->display_options['fields']['title']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['title']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['title']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = 0;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = 0;
  $handler->display->display_options['fields']['title']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['title']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['title']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['title']['alter']['html'] = 0;
  $handler->display->display_options['fields']['title']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['title']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['title']['hide_empty'] = 0;
  $handler->display->display_options['fields']['title']['empty_zero'] = 0;
  $handler->display->display_options['fields']['title']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['title']['link_to_node'] = 1;
  /* Field: Content: Logo */
  $handler->display->display_options['fields']['field_p_logo']['id'] = 'field_p_logo';
  $handler->display->display_options['fields']['field_p_logo']['table'] = 'field_data_field_p_logo';
  $handler->display->display_options['fields']['field_p_logo']['field'] = 'field_p_logo';
  $handler->display->display_options['fields']['field_p_logo']['label'] = 'VoIP Provider';
  $handler->display->display_options['fields']['field_p_logo']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['external'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['html'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['empty'] = '[title]';
  $handler->display->display_options['fields']['field_p_logo']['hide_empty'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['empty_zero'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['hide_alter_empty'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_p_logo']['settings'] = array(
    'image_style' => 'logo_provider_chart_main',
    'image_link' => 'content',
  );
  $handler->display->display_options['fields']['field_p_logo']['field_api_classes'] = 0;
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php']['id'] = 'php';
  $handler->display->display_options['fields']['php']['table'] = 'views';
  $handler->display->display_options['fields']['php']['field'] = 'php';
  $handler->display->display_options['fields']['php']['label'] = 'Plan Features';
  $handler->display->display_options['fields']['php']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'features\', array(\'data\' => $data, \'service_type\' =>\'re\'));
  return $value;';
  $handler->display->display_options['fields']['php']['php_output'] = '<?php
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php']['use_php_click_sortable'] = '0';
  $handler->display->display_options['fields']['php']['php_click_sortable'] = '';
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_3']['id'] = 'php_3';
  $handler->display->display_options['fields']['php_3']['table'] = 'views';
  $handler->display->display_options['fields']['php_3']['field'] = 'php';
  $handler->display->display_options['fields']['php_3']['label'] = 'Setup Costs';
  $handler->display->display_options['fields']['php_3']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_3']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_3']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_3']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php_3']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_3']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_3']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_3']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_3']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_3']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'setup\', array(\'data\' => $data, \'service_type\' =>\'re\'));
  return $value;';
  $handler->display->display_options['fields']['php_3']['php_output'] = '<?php 
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php_3']['use_php_click_sortable'] = '3';
  $handler->display->display_options['fields']['php_3']['php_click_sortable'] = '';
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_2']['id'] = 'php_2';
  $handler->display->display_options['fields']['php_2']['table'] = 'views';
  $handler->display->display_options['fields']['php_2']['field'] = 'php';
  $handler->display->display_options['fields']['php_2']['label'] = 'Monthly Price';
  $handler->display->display_options['fields']['php_2']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_2']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_2']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_2']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php_2']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_2']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_2']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_2']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_2']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_2']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'monthly\', array(\'data\' => $data, \'service_type\' =>\'re\'));
  return $value;';
  $handler->display->display_options['fields']['php_2']['php_output'] = '<?php
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php_2']['use_php_click_sortable'] = '3';
  $handler->display->display_options['fields']['php_2']['php_click_sortable'] = '';
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_1']['id'] = 'php_1';
  $handler->display->display_options['fields']['php_1']['table'] = 'views';
  $handler->display->display_options['fields']['php_1']['field'] = 'php';
  $handler->display->display_options['fields']['php_1']['label'] = 'Money Back Guarantee';
  $handler->display->display_options['fields']['php_1']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_1']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_1']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_1']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php_1']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_1']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_1']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_1']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_1']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_1']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'back\', array(\'data\' => $data, \'service_type\' =>\'re\'));
  return $value;';
  $handler->display->display_options['fields']['php_1']['php_output'] = '<?php 
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php_1']['use_php_click_sortable'] = '3';
  $handler->display->display_options['fields']['php_1']['php_click_sortable'] = '';
  /* Field: Vote results: Value */
  $handler->display->display_options['fields']['value']['id'] = 'value';
  $handler->display->display_options['fields']['value']['table'] = 'votingapi_cache';
  $handler->display->display_options['fields']['value']['field'] = 'value';
  $handler->display->display_options['fields']['value']['relationship'] = 'votingapi_cache';
  $handler->display->display_options['fields']['value']['label'] = '';
  $handler->display->display_options['fields']['value']['exclude'] = TRUE;
  $handler->display->display_options['fields']['value']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['value']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['value']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['value']['alter']['external'] = 0;
  $handler->display->display_options['fields']['value']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['value']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['value']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['value']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['value']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['value']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['value']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['value']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['value']['alter']['html'] = 0;
  $handler->display->display_options['fields']['value']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['value']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['value']['hide_empty'] = 0;
  $handler->display->display_options['fields']['value']['empty_zero'] = 0;
  $handler->display->display_options['fields']['value']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['value']['set_precision'] = 0;
  $handler->display->display_options['fields']['value']['precision'] = '0';
  $handler->display->display_options['fields']['value']['format_plural'] = 0;
  /* Field: Vote results: Value */
  $handler->display->display_options['fields']['value_1']['id'] = 'value_1';
  $handler->display->display_options['fields']['value_1']['table'] = 'votingapi_cache';
  $handler->display->display_options['fields']['value_1']['field'] = 'value';
  $handler->display->display_options['fields']['value_1']['relationship'] = 'votingapi_cache_1';
  $handler->display->display_options['fields']['value_1']['label'] = 'Value Counts';
  $handler->display->display_options['fields']['value_1']['exclude'] = TRUE;
  $handler->display->display_options['fields']['value_1']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['external'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['value_1']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['value_1']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['html'] = 0;
  $handler->display->display_options['fields']['value_1']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['value_1']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['value_1']['hide_empty'] = 0;
  $handler->display->display_options['fields']['value_1']['empty_zero'] = 0;
  $handler->display->display_options['fields']['value_1']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['value_1']['set_precision'] = 0;
  $handler->display->display_options['fields']['value_1']['precision'] = '0';
  $handler->display->display_options['fields']['value_1']['format_plural'] = 0;
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_4']['id'] = 'php_4';
  $handler->display->display_options['fields']['php_4']['table'] = 'views';
  $handler->display->display_options['fields']['php_4']['field'] = 'php';
  $handler->display->display_options['fields']['php_4']['label'] = 'User Ratings & Reviews';
  $handler->display->display_options['fields']['php_4']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_4']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_4']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_4']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php_4']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_4']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_4']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_4']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_4']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_4']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'rating\', array(\'data\' => $data));
  return $value;';
  $handler->display->display_options['fields']['php_4']['php_output'] = '<?php
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php_4']['use_php_click_sortable'] = '6';
  $handler->display->display_options['fields']['php_4']['php_click_sortable'] = 'if ($row1->value >= $row2->value) {
    return 1;
  }
  else {
    return -1;
  }';
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_5']['id'] = 'php_5';
  $handler->display->display_options['fields']['php_5']['table'] = 'views';
  $handler->display->display_options['fields']['php_5']['field'] = 'php';
  $handler->display->display_options['fields']['php_5']['label'] = 'Visit Provider';
  $handler->display->display_options['fields']['php_5']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_5']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_5']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_5']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php_5']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_5']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_5']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_5']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_5']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_5']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'i_web\', array(\'data\' => $data));
  return $value;';
  $handler->display->display_options['fields']['php_5']['php_output'] = '<?php 
  echo \'<a href="\' . $value . \'" class="site" target="_blank">\' . t(\'Visit Site\') . \'</a>\';
  ?>';
  $handler->display->display_options['fields']['php_5']['use_php_click_sortable'] = '3';
  $handler->display->display_options['fields']['php_5']['php_click_sortable'] = '';
  $handler->display->display_options['defaults']['sorts'] = FALSE;
  /* Sort criterion: Content: Listing Position (field_p_erating) */
  $handler->display->display_options['sorts']['field_p_erating_value']['id'] = 'field_p_erating_value';
  $handler->display->display_options['sorts']['field_p_erating_value']['table'] = 'field_data_field_p_erating';
  $handler->display->display_options['sorts']['field_p_erating_value']['field'] = 'field_p_erating_value';
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  $handler->display->display_options['defaults']['filters'] = FALSE;
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'provider' => 'provider',
  );
  /* Filter criterion: Content: Service Types Available (field_p_types) */
  $handler->display->display_options['filters']['field_p_types_value']['id'] = 'field_p_types_value';
  $handler->display->display_options['filters']['field_p_types_value']['table'] = 'field_data_field_p_types';
  $handler->display->display_options['filters']['field_p_types_value']['field'] = 'field_p_types_value';
  $handler->display->display_options['filters']['field_p_types_value']['value'] = array(
    'residential' => 'residential',
  );
  /* Filter criterion: Content: Listing Position (field_p_erating) */
  $handler->display->display_options['filters']['field_p_erating_value']['id'] = 'field_p_erating_value';
  $handler->display->display_options['filters']['field_p_erating_value']['table'] = 'field_data_field_p_erating';
  $handler->display->display_options['filters']['field_p_erating_value']['field'] = 'field_p_erating_value';
  $handler->display->display_options['filters']['field_p_erating_value']['operator'] = 'not empty';

  /* Display: Block - Top business */
  $handler = $view->new_display('block', 'Block - Top business', 'block');
  $handler->display->display_options['defaults']['title'] = FALSE;
  $handler->display->display_options['title'] = 'Compare Top Pick Business VoIP Providers';
  $handler->display->display_options['display_description'] = 'Top business providers';
  $handler->display->display_options['defaults']['use_more'] = FALSE;
  $handler->display->display_options['use_more'] = TRUE;
  $handler->display->display_options['use_more_always'] = TRUE;
  $handler->display->display_options['use_more_text'] = 'View All Business VoIP Providers >>';
  $handler->display->display_options['defaults']['link_display'] = FALSE;
  $handler->display->display_options['link_display'] = 'page_p_bu';
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'some';
  $handler->display->display_options['pager']['options']['items_per_page'] = '5';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'table';
  $handler->display->display_options['style_options']['columns'] = array(
    'title' => 'title',
    'field_p_logo' => 'field_p_logo',
    'php' => 'php',
    'php_3' => 'php_3',
    'php_2' => 'php_2',
    'php_1' => 'php_1',
    'value' => 'value',
    'value_1' => 'value_1',
    'php_4' => 'php_4',
    'php_5' => 'php_5',
  );
  $handler->display->display_options['style_options']['default'] = '-1';
  $handler->display->display_options['style_options']['info'] = array(
    'title' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'field_p_logo' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php' => array(
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php_3' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php_2' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php_1' => array(
      'sortable' => 0,
      'default_sort_order' => 'desc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'value' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'value_1' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php_4' => array(
      'sortable' => 0,
      'default_sort_order' => 'desc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php_5' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
  );
  $handler->display->display_options['style_options']['override'] = 1;
  $handler->display->display_options['style_options']['sticky'] = 0;
  $handler->display->display_options['style_options']['empty_table'] = 0;
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['exclude'] = TRUE;
  $handler->display->display_options['fields']['title']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['title']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['title']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['title']['alter']['external'] = 0;
  $handler->display->display_options['fields']['title']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['title']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['title']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = 0;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = 0;
  $handler->display->display_options['fields']['title']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['title']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['title']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['title']['alter']['html'] = 0;
  $handler->display->display_options['fields']['title']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['title']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['title']['hide_empty'] = 0;
  $handler->display->display_options['fields']['title']['empty_zero'] = 0;
  $handler->display->display_options['fields']['title']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['title']['link_to_node'] = 1;
  /* Field: Content: Logo */
  $handler->display->display_options['fields']['field_p_logo']['id'] = 'field_p_logo';
  $handler->display->display_options['fields']['field_p_logo']['table'] = 'field_data_field_p_logo';
  $handler->display->display_options['fields']['field_p_logo']['field'] = 'field_p_logo';
  $handler->display->display_options['fields']['field_p_logo']['label'] = 'VoIP Provider';
  $handler->display->display_options['fields']['field_p_logo']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['external'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['html'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['empty'] = '[title]';
  $handler->display->display_options['fields']['field_p_logo']['hide_empty'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['empty_zero'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['hide_alter_empty'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_p_logo']['settings'] = array(
    'image_style' => 'logo_provider_chart_main',
    'image_link' => 'content',
  );
  $handler->display->display_options['fields']['field_p_logo']['field_api_classes'] = 0;
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php']['id'] = 'php';
  $handler->display->display_options['fields']['php']['table'] = 'views';
  $handler->display->display_options['fields']['php']['field'] = 'php';
  $handler->display->display_options['fields']['php']['label'] = 'Plan Features';
  $handler->display->display_options['fields']['php']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'features\', array(\'data\' => $data, \'service_type\' =>\'bu\'));
  return $value;';
  $handler->display->display_options['fields']['php']['php_output'] = '<?php
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php']['use_php_click_sortable'] = '0';
  $handler->display->display_options['fields']['php']['php_click_sortable'] = '';
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_3']['id'] = 'php_3';
  $handler->display->display_options['fields']['php_3']['table'] = 'views';
  $handler->display->display_options['fields']['php_3']['field'] = 'php';
  $handler->display->display_options['fields']['php_3']['label'] = 'Setup Costs';
  $handler->display->display_options['fields']['php_3']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_3']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_3']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_3']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php_3']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_3']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_3']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_3']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_3']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_3']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'setup\', array(\'data\' => $data, \'service_type\' =>\'bu\'));
  return $value;';
  $handler->display->display_options['fields']['php_3']['php_output'] = '<?php 
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php_3']['use_php_click_sortable'] = '3';
  $handler->display->display_options['fields']['php_3']['php_click_sortable'] = '';
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_2']['id'] = 'php_2';
  $handler->display->display_options['fields']['php_2']['table'] = 'views';
  $handler->display->display_options['fields']['php_2']['field'] = 'php';
  $handler->display->display_options['fields']['php_2']['label'] = 'Monthly Price';
  $handler->display->display_options['fields']['php_2']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_2']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_2']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_2']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php_2']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_2']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_2']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_2']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_2']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_2']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'monthly\', array(\'data\' => $data, \'service_type\' =>\'bu\'));
  return $value;';
  $handler->display->display_options['fields']['php_2']['php_output'] = '<?php
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php_2']['use_php_click_sortable'] = '3';
  $handler->display->display_options['fields']['php_2']['php_click_sortable'] = '';
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_1']['id'] = 'php_1';
  $handler->display->display_options['fields']['php_1']['table'] = 'views';
  $handler->display->display_options['fields']['php_1']['field'] = 'php';
  $handler->display->display_options['fields']['php_1']['label'] = 'Money Back Guarantee';
  $handler->display->display_options['fields']['php_1']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_1']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_1']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_1']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php_1']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_1']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_1']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_1']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_1']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_1']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'back\', array(\'data\' => $data, \'service_type\' =>\'bu\'));
  return $value;';
  $handler->display->display_options['fields']['php_1']['php_output'] = '<?php 
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php_1']['use_php_click_sortable'] = '3';
  $handler->display->display_options['fields']['php_1']['php_click_sortable'] = '';
  /* Field: Vote results: Value */
  $handler->display->display_options['fields']['value']['id'] = 'value';
  $handler->display->display_options['fields']['value']['table'] = 'votingapi_cache';
  $handler->display->display_options['fields']['value']['field'] = 'value';
  $handler->display->display_options['fields']['value']['relationship'] = 'votingapi_cache';
  $handler->display->display_options['fields']['value']['label'] = '';
  $handler->display->display_options['fields']['value']['exclude'] = TRUE;
  $handler->display->display_options['fields']['value']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['value']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['value']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['value']['alter']['external'] = 0;
  $handler->display->display_options['fields']['value']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['value']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['value']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['value']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['value']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['value']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['value']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['value']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['value']['alter']['html'] = 0;
  $handler->display->display_options['fields']['value']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['value']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['value']['hide_empty'] = 0;
  $handler->display->display_options['fields']['value']['empty_zero'] = 0;
  $handler->display->display_options['fields']['value']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['value']['set_precision'] = 0;
  $handler->display->display_options['fields']['value']['precision'] = '0';
  $handler->display->display_options['fields']['value']['format_plural'] = 0;
  /* Field: Vote results: Value */
  $handler->display->display_options['fields']['value_1']['id'] = 'value_1';
  $handler->display->display_options['fields']['value_1']['table'] = 'votingapi_cache';
  $handler->display->display_options['fields']['value_1']['field'] = 'value';
  $handler->display->display_options['fields']['value_1']['relationship'] = 'votingapi_cache_1';
  $handler->display->display_options['fields']['value_1']['label'] = 'Value Counts';
  $handler->display->display_options['fields']['value_1']['exclude'] = TRUE;
  $handler->display->display_options['fields']['value_1']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['external'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['value_1']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['value_1']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['html'] = 0;
  $handler->display->display_options['fields']['value_1']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['value_1']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['value_1']['hide_empty'] = 0;
  $handler->display->display_options['fields']['value_1']['empty_zero'] = 0;
  $handler->display->display_options['fields']['value_1']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['value_1']['set_precision'] = 0;
  $handler->display->display_options['fields']['value_1']['precision'] = '0';
  $handler->display->display_options['fields']['value_1']['format_plural'] = 0;
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_4']['id'] = 'php_4';
  $handler->display->display_options['fields']['php_4']['table'] = 'views';
  $handler->display->display_options['fields']['php_4']['field'] = 'php';
  $handler->display->display_options['fields']['php_4']['label'] = 'User Ratings & Reviews';
  $handler->display->display_options['fields']['php_4']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_4']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_4']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_4']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php_4']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_4']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_4']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_4']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_4']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_4']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'rating\', array(\'data\' => $data));
  return $value;';
  $handler->display->display_options['fields']['php_4']['php_output'] = '<?php
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php_4']['use_php_click_sortable'] = '6';
  $handler->display->display_options['fields']['php_4']['php_click_sortable'] = 'if ($row1->value >= $row2->value) {
    return 1;
  }
  else {
    return -1;
  }';
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_5']['id'] = 'php_5';
  $handler->display->display_options['fields']['php_5']['table'] = 'views';
  $handler->display->display_options['fields']['php_5']['field'] = 'php';
  $handler->display->display_options['fields']['php_5']['label'] = 'Visit Provider';
  $handler->display->display_options['fields']['php_5']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_5']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_5']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_5']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php_5']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_5']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_5']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_5']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_5']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_5']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'i_web\', array(\'data\' => $data));
  return $value;';
  $handler->display->display_options['fields']['php_5']['php_output'] = '<?php 
  echo \'<a href="\' . $value . \'" class="site" target="_blank">\' . t(\'Visit Site\') . \'</a>\';
  ?>';
  $handler->display->display_options['fields']['php_5']['use_php_click_sortable'] = '3';
  $handler->display->display_options['fields']['php_5']['php_click_sortable'] = '';
  $handler->display->display_options['defaults']['sorts'] = FALSE;
  /* Sort criterion: Content: Listing Position (field_p_erating) */
  $handler->display->display_options['sorts']['field_p_erating_value']['id'] = 'field_p_erating_value';
  $handler->display->display_options['sorts']['field_p_erating_value']['table'] = 'field_data_field_p_erating';
  $handler->display->display_options['sorts']['field_p_erating_value']['field'] = 'field_p_erating_value';
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  $handler->display->display_options['defaults']['filters'] = FALSE;
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'provider' => 'provider',
  );
  /* Filter criterion: Content: Service Types Available (field_p_types) */
  $handler->display->display_options['filters']['field_p_types_value']['id'] = 'field_p_types_value';
  $handler->display->display_options['filters']['field_p_types_value']['table'] = 'field_data_field_p_types';
  $handler->display->display_options['filters']['field_p_types_value']['field'] = 'field_p_types_value';
  $handler->display->display_options['filters']['field_p_types_value']['value'] = array(
    'business' => 'business',
  );
  /* Filter criterion: Content: Listing Position (field_p_erating) */
  $handler->display->display_options['filters']['field_p_erating_value']['id'] = 'field_p_erating_value';
  $handler->display->display_options['filters']['field_p_erating_value']['table'] = 'field_data_field_p_erating';
  $handler->display->display_options['filters']['field_p_erating_value']['field'] = 'field_p_erating_value';
  $handler->display->display_options['filters']['field_p_erating_value']['operator'] = 'not empty';

  /* Display: Page - Business Providers */
  $handler = $view->new_display('page', 'Page - Business Providers', 'page_p_bu');
  $handler->display->display_options['defaults']['title'] = FALSE;
  $handler->display->display_options['title'] = 'Business providers ';
  $handler->display->display_options['enabled'] = FALSE;
  $handler->display->display_options['display_description'] = 'Page with Business Providers';
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '12';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['pager']['options']['id'] = '0';
  $handler->display->display_options['pager']['options']['expose']['items_per_page_options_all'] = 0;
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'table';
  $handler->display->display_options['style_options']['columns'] = array(
    'title' => 'title',
    'body' => 'body',
  );
  $handler->display->display_options['style_options']['default'] = '-1';
  $handler->display->display_options['style_options']['info'] = array(
    'title' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'body' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
  );
  $handler->display->display_options['style_options']['override'] = 1;
  $handler->display->display_options['style_options']['sticky'] = 0;
  $handler->display->display_options['style_options']['empty_table'] = 0;
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['exclude'] = TRUE;
  $handler->display->display_options['fields']['title']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['title']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['title']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['title']['alter']['external'] = 0;
  $handler->display->display_options['fields']['title']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['title']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['title']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = 0;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = 0;
  $handler->display->display_options['fields']['title']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['title']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['title']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['title']['alter']['html'] = 0;
  $handler->display->display_options['fields']['title']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['title']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['title']['hide_empty'] = 0;
  $handler->display->display_options['fields']['title']['empty_zero'] = 0;
  $handler->display->display_options['fields']['title']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['title']['link_to_node'] = 1;
  /* Field: Content: Logo */
  $handler->display->display_options['fields']['field_p_logo']['id'] = 'field_p_logo';
  $handler->display->display_options['fields']['field_p_logo']['table'] = 'field_data_field_p_logo';
  $handler->display->display_options['fields']['field_p_logo']['field'] = 'field_p_logo';
  $handler->display->display_options['fields']['field_p_logo']['label'] = 'VoIP Provider';
  $handler->display->display_options['fields']['field_p_logo']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['external'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['html'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['empty'] = '[title]';
  $handler->display->display_options['fields']['field_p_logo']['hide_empty'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['empty_zero'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['hide_alter_empty'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_p_logo']['settings'] = array(
    'image_style' => 'thumbnail',
    'image_link' => 'content',
  );
  $handler->display->display_options['fields']['field_p_logo']['field_api_classes'] = 0;
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php']['id'] = 'php';
  $handler->display->display_options['fields']['php']['table'] = 'views';
  $handler->display->display_options['fields']['php']['field'] = 'php';
  $handler->display->display_options['fields']['php']['label'] = 'Plan Features';
  $handler->display->display_options['fields']['php']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'features\', array(\'data\' => $data, \'service_type\' =>\'bu\'));
  return $value;';
  $handler->display->display_options['fields']['php']['php_output'] = '<?php
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php']['use_php_click_sortable'] = '0';
  $handler->display->display_options['fields']['php']['php_click_sortable'] = '';
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_3']['id'] = 'php_3';
  $handler->display->display_options['fields']['php_3']['table'] = 'views';
  $handler->display->display_options['fields']['php_3']['field'] = 'php';
  $handler->display->display_options['fields']['php_3']['label'] = 'Setup Costs';
  $handler->display->display_options['fields']['php_3']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_3']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_3']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_3']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php_3']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_3']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_3']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_3']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_3']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_3']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'setup\', array(\'data\' => $data, \'service_type\' =>\'bu\'));
  return $value;';
  $handler->display->display_options['fields']['php_3']['php_output'] = '<?php 
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php_3']['use_php_click_sortable'] = '3';
  $handler->display->display_options['fields']['php_3']['php_click_sortable'] = '';
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_2']['id'] = 'php_2';
  $handler->display->display_options['fields']['php_2']['table'] = 'views';
  $handler->display->display_options['fields']['php_2']['field'] = 'php';
  $handler->display->display_options['fields']['php_2']['label'] = 'Monthly Price';
  $handler->display->display_options['fields']['php_2']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_2']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_2']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_2']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php_2']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_2']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_2']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_2']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_2']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_2']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'monthly\', array(\'data\' => $data, \'service_type\' =>\'bu\'));
  return $value;';
  $handler->display->display_options['fields']['php_2']['php_output'] = '<?php
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php_2']['use_php_click_sortable'] = '3';
  $handler->display->display_options['fields']['php_2']['php_click_sortable'] = '';
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_1']['id'] = 'php_1';
  $handler->display->display_options['fields']['php_1']['table'] = 'views';
  $handler->display->display_options['fields']['php_1']['field'] = 'php';
  $handler->display->display_options['fields']['php_1']['label'] = 'Money Back Guarantee';
  $handler->display->display_options['fields']['php_1']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_1']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_1']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_1']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php_1']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_1']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_1']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_1']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_1']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_1']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'back\', array(\'data\' => $data, \'service_type\' =>\'bu\'));
  return $value;';
  $handler->display->display_options['fields']['php_1']['php_output'] = '<?php 
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php_1']['use_php_click_sortable'] = '3';
  $handler->display->display_options['fields']['php_1']['php_click_sortable'] = '';
  /* Field: Vote results: Value */
  $handler->display->display_options['fields']['value']['id'] = 'value';
  $handler->display->display_options['fields']['value']['table'] = 'votingapi_cache';
  $handler->display->display_options['fields']['value']['field'] = 'value';
  $handler->display->display_options['fields']['value']['relationship'] = 'votingapi_cache';
  $handler->display->display_options['fields']['value']['label'] = '';
  $handler->display->display_options['fields']['value']['exclude'] = TRUE;
  $handler->display->display_options['fields']['value']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['value']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['value']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['value']['alter']['external'] = 0;
  $handler->display->display_options['fields']['value']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['value']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['value']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['value']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['value']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['value']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['value']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['value']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['value']['alter']['html'] = 0;
  $handler->display->display_options['fields']['value']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['value']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['value']['hide_empty'] = 0;
  $handler->display->display_options['fields']['value']['empty_zero'] = 0;
  $handler->display->display_options['fields']['value']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['value']['set_precision'] = 0;
  $handler->display->display_options['fields']['value']['precision'] = '0';
  $handler->display->display_options['fields']['value']['format_plural'] = 0;
  /* Field: Vote results: Value */
  $handler->display->display_options['fields']['value_1']['id'] = 'value_1';
  $handler->display->display_options['fields']['value_1']['table'] = 'votingapi_cache';
  $handler->display->display_options['fields']['value_1']['field'] = 'value';
  $handler->display->display_options['fields']['value_1']['relationship'] = 'votingapi_cache_1';
  $handler->display->display_options['fields']['value_1']['label'] = '';
  $handler->display->display_options['fields']['value_1']['exclude'] = TRUE;
  $handler->display->display_options['fields']['value_1']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['external'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['value_1']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['value_1']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['html'] = 0;
  $handler->display->display_options['fields']['value_1']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['value_1']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['value_1']['hide_empty'] = 0;
  $handler->display->display_options['fields']['value_1']['empty_zero'] = 0;
  $handler->display->display_options['fields']['value_1']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['value_1']['set_precision'] = 0;
  $handler->display->display_options['fields']['value_1']['precision'] = '0';
  $handler->display->display_options['fields']['value_1']['format_plural'] = 0;
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_4']['id'] = 'php_4';
  $handler->display->display_options['fields']['php_4']['table'] = 'views';
  $handler->display->display_options['fields']['php_4']['field'] = 'php';
  $handler->display->display_options['fields']['php_4']['label'] = 'User Ratings & Reviews';
  $handler->display->display_options['fields']['php_4']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_4']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_4']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_4']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php_4']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_4']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_4']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_4']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_4']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_4']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'rating\', array(\'data\' => $data));
  return $value;';
  $handler->display->display_options['fields']['php_4']['php_output'] = '<?php
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php_4']['use_php_click_sortable'] = '6';
  $handler->display->display_options['fields']['php_4']['php_click_sortable'] = 'if ($row1->value >= $row2->value) {
    return 1;
  }
  else {
    return -1;
  }';
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_5']['id'] = 'php_5';
  $handler->display->display_options['fields']['php_5']['table'] = 'views';
  $handler->display->display_options['fields']['php_5']['field'] = 'php';
  $handler->display->display_options['fields']['php_5']['label'] = 'Visit Provider';
  $handler->display->display_options['fields']['php_5']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_5']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_5']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_5']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php_5']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_5']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_5']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_5']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_5']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_5']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'i_web\', array(\'data\' => $data));
  return $value;';
  $handler->display->display_options['fields']['php_5']['php_output'] = '<?php 
  echo \'<a href="\' . $value . \'" class="site" target="_blank">\' . t(\'Visit Site\') . \'</a>\';
  ?>';
  $handler->display->display_options['fields']['php_5']['use_php_click_sortable'] = '3';
  $handler->display->display_options['fields']['php_5']['php_click_sortable'] = '';
  $handler->display->display_options['defaults']['sorts'] = FALSE;
  /* Sort criterion: Content: Listing Position (field_p_erating) */
  $handler->display->display_options['sorts']['field_p_erating_value']['id'] = 'field_p_erating_value';
  $handler->display->display_options['sorts']['field_p_erating_value']['table'] = 'field_data_field_p_erating';
  $handler->display->display_options['sorts']['field_p_erating_value']['field'] = 'field_p_erating_value';
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  $handler->display->display_options['defaults']['filters'] = FALSE;
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'provider' => 'provider',
  );
  /* Filter criterion: Content: Service Types Available (field_p_types) */
  $handler->display->display_options['filters']['field_p_types_value']['id'] = 'field_p_types_value';
  $handler->display->display_options['filters']['field_p_types_value']['table'] = 'field_data_field_p_types';
  $handler->display->display_options['filters']['field_p_types_value']['field'] = 'field_p_types_value';
  $handler->display->display_options['filters']['field_p_types_value']['value'] = array(
    'business' => 'business',
  );
  /* Filter criterion: Content: Listing Position (field_p_erating) */
  $handler->display->display_options['filters']['field_p_erating_value']['id'] = 'field_p_erating_value';
  $handler->display->display_options['filters']['field_p_erating_value']['table'] = 'field_data_field_p_erating';
  $handler->display->display_options['filters']['field_p_erating_value']['field'] = 'field_p_erating_value';
  $handler->display->display_options['filters']['field_p_erating_value']['operator'] = 'not empty';
  $handler->display->display_options['path'] = 'compare-business-voip-providers';

  /* Display: Page - Residential Providers */
  $handler = $view->new_display('page', 'Page - Residential Providers', 'page_p_re');
  $handler->display->display_options['defaults']['title'] = FALSE;
  $handler->display->display_options['title'] = 'Residential providers';
  $handler->display->display_options['enabled'] = FALSE;
  $handler->display->display_options['display_description'] = 'Page with Residential Providers';
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '12';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['pager']['options']['id'] = '0';
  $handler->display->display_options['pager']['options']['expose']['items_per_page_options_all'] = 0;
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'table';
  $handler->display->display_options['style_options']['columns'] = array(
    'title' => 'title',
    'field_p_logo' => 'field_p_logo',
    'php' => 'php',
    'php_3' => 'php_3',
    'php_2' => 'php_2',
    'php_1' => 'php_1',
    'value' => 'value',
    'value_1' => 'value_1',
    'php_4' => 'php_4',
    'php_5' => 'php_5',
  );
  $handler->display->display_options['style_options']['default'] = '-1';
  $handler->display->display_options['style_options']['info'] = array(
    'title' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'field_p_logo' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php' => array(
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php_3' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php_2' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php_1' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'value' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'value_1' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php_4' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php_5' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
  );
  $handler->display->display_options['style_options']['override'] = 1;
  $handler->display->display_options['style_options']['sticky'] = 0;
  $handler->display->display_options['style_options']['empty_table'] = 0;
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['exclude'] = TRUE;
  $handler->display->display_options['fields']['title']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['title']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['title']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['title']['alter']['external'] = 0;
  $handler->display->display_options['fields']['title']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['title']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['title']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = 0;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = 0;
  $handler->display->display_options['fields']['title']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['title']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['title']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['title']['alter']['html'] = 0;
  $handler->display->display_options['fields']['title']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['title']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['title']['hide_empty'] = 0;
  $handler->display->display_options['fields']['title']['empty_zero'] = 0;
  $handler->display->display_options['fields']['title']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['title']['link_to_node'] = 1;
  /* Field: Content: Logo */
  $handler->display->display_options['fields']['field_p_logo']['id'] = 'field_p_logo';
  $handler->display->display_options['fields']['field_p_logo']['table'] = 'field_data_field_p_logo';
  $handler->display->display_options['fields']['field_p_logo']['field'] = 'field_p_logo';
  $handler->display->display_options['fields']['field_p_logo']['label'] = 'VoIP Provider';
  $handler->display->display_options['fields']['field_p_logo']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['external'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['html'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['empty'] = '[title]';
  $handler->display->display_options['fields']['field_p_logo']['hide_empty'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['empty_zero'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['hide_alter_empty'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_p_logo']['settings'] = array(
    'image_style' => 'thumbnail',
    'image_link' => 'content',
  );
  $handler->display->display_options['fields']['field_p_logo']['field_api_classes'] = 0;
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php']['id'] = 'php';
  $handler->display->display_options['fields']['php']['table'] = 'views';
  $handler->display->display_options['fields']['php']['field'] = 'php';
  $handler->display->display_options['fields']['php']['label'] = 'Plan Features';
  $handler->display->display_options['fields']['php']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'features\', array(\'data\' => $data, \'service_type\' =>\'re\'));
  return $value;';
  $handler->display->display_options['fields']['php']['php_output'] = '<?php
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php']['use_php_click_sortable'] = '0';
  $handler->display->display_options['fields']['php']['php_click_sortable'] = '';
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_3']['id'] = 'php_3';
  $handler->display->display_options['fields']['php_3']['table'] = 'views';
  $handler->display->display_options['fields']['php_3']['field'] = 'php';
  $handler->display->display_options['fields']['php_3']['label'] = 'Setup Costs';
  $handler->display->display_options['fields']['php_3']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_3']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_3']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_3']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php_3']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_3']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_3']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_3']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_3']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_3']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'setup\', array(\'data\' => $data, \'service_type\' =>\'re\'));
  return $value;';
  $handler->display->display_options['fields']['php_3']['php_output'] = '<?php 
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php_3']['use_php_click_sortable'] = '3';
  $handler->display->display_options['fields']['php_3']['php_click_sortable'] = '';
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_2']['id'] = 'php_2';
  $handler->display->display_options['fields']['php_2']['table'] = 'views';
  $handler->display->display_options['fields']['php_2']['field'] = 'php';
  $handler->display->display_options['fields']['php_2']['label'] = 'Monthly Price';
  $handler->display->display_options['fields']['php_2']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_2']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_2']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_2']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php_2']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_2']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_2']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_2']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_2']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_2']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'monthly\', array(\'data\' => $data, \'service_type\' =>\'re\'));
  return $value;';
  $handler->display->display_options['fields']['php_2']['php_output'] = '<?php
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php_2']['use_php_click_sortable'] = '3';
  $handler->display->display_options['fields']['php_2']['php_click_sortable'] = '';
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_1']['id'] = 'php_1';
  $handler->display->display_options['fields']['php_1']['table'] = 'views';
  $handler->display->display_options['fields']['php_1']['field'] = 'php';
  $handler->display->display_options['fields']['php_1']['label'] = 'Money Back Guarantee';
  $handler->display->display_options['fields']['php_1']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_1']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_1']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_1']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php_1']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_1']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_1']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_1']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_1']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_1']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'back\', array(\'data\' => $data, \'service_type\' =>\'re\'));
  return $value;';
  $handler->display->display_options['fields']['php_1']['php_output'] = '<?php 
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php_1']['use_php_click_sortable'] = '3';
  $handler->display->display_options['fields']['php_1']['php_click_sortable'] = '';
  /* Field: Vote results: Value */
  $handler->display->display_options['fields']['value']['id'] = 'value';
  $handler->display->display_options['fields']['value']['table'] = 'votingapi_cache';
  $handler->display->display_options['fields']['value']['field'] = 'value';
  $handler->display->display_options['fields']['value']['relationship'] = 'votingapi_cache';
  $handler->display->display_options['fields']['value']['label'] = '';
  $handler->display->display_options['fields']['value']['exclude'] = TRUE;
  $handler->display->display_options['fields']['value']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['value']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['value']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['value']['alter']['external'] = 0;
  $handler->display->display_options['fields']['value']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['value']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['value']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['value']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['value']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['value']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['value']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['value']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['value']['alter']['html'] = 0;
  $handler->display->display_options['fields']['value']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['value']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['value']['hide_empty'] = 0;
  $handler->display->display_options['fields']['value']['empty_zero'] = 0;
  $handler->display->display_options['fields']['value']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['value']['set_precision'] = 0;
  $handler->display->display_options['fields']['value']['precision'] = '0';
  $handler->display->display_options['fields']['value']['format_plural'] = 0;
  /* Field: Vote results: Value */
  $handler->display->display_options['fields']['value_1']['id'] = 'value_1';
  $handler->display->display_options['fields']['value_1']['table'] = 'votingapi_cache';
  $handler->display->display_options['fields']['value_1']['field'] = 'value';
  $handler->display->display_options['fields']['value_1']['relationship'] = 'votingapi_cache_1';
  $handler->display->display_options['fields']['value_1']['label'] = '';
  $handler->display->display_options['fields']['value_1']['exclude'] = TRUE;
  $handler->display->display_options['fields']['value_1']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['external'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['value_1']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['value_1']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['html'] = 0;
  $handler->display->display_options['fields']['value_1']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['value_1']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['value_1']['hide_empty'] = 0;
  $handler->display->display_options['fields']['value_1']['empty_zero'] = 0;
  $handler->display->display_options['fields']['value_1']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['value_1']['set_precision'] = 0;
  $handler->display->display_options['fields']['value_1']['precision'] = '0';
  $handler->display->display_options['fields']['value_1']['format_plural'] = 0;
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_4']['id'] = 'php_4';
  $handler->display->display_options['fields']['php_4']['table'] = 'views';
  $handler->display->display_options['fields']['php_4']['field'] = 'php';
  $handler->display->display_options['fields']['php_4']['label'] = 'User Ratings & Reviews';
  $handler->display->display_options['fields']['php_4']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_4']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_4']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_4']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php_4']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_4']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_4']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_4']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_4']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_4']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'rating\', array(\'data\' => $data));
  return $value;';
  $handler->display->display_options['fields']['php_4']['php_output'] = '<?php
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php_4']['use_php_click_sortable'] = '6';
  $handler->display->display_options['fields']['php_4']['php_click_sortable'] = 'if ($row1->value >= $row2->value) {
    return 1;
  }
  else {
    return -1;
  }';
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_5']['id'] = 'php_5';
  $handler->display->display_options['fields']['php_5']['table'] = 'views';
  $handler->display->display_options['fields']['php_5']['field'] = 'php';
  $handler->display->display_options['fields']['php_5']['label'] = 'Visit Provider';
  $handler->display->display_options['fields']['php_5']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_5']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_5']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_5']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php_5']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_5']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_5']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_5']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_5']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_5']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'i_web\', array(\'data\' => $data));
  return $value;';
  $handler->display->display_options['fields']['php_5']['php_output'] = '<?php 
  echo \'<a href="\' . $value . \'" class="site" target="_blank">\' . t(\'Visit Site\') . \'</a>\';
  ?>';
  $handler->display->display_options['fields']['php_5']['use_php_click_sortable'] = '3';
  $handler->display->display_options['fields']['php_5']['php_click_sortable'] = '';
  $handler->display->display_options['defaults']['sorts'] = FALSE;
  /* Sort criterion: Content: Listing Position (field_p_erating) */
  $handler->display->display_options['sorts']['field_p_erating_value']['id'] = 'field_p_erating_value';
  $handler->display->display_options['sorts']['field_p_erating_value']['table'] = 'field_data_field_p_erating';
  $handler->display->display_options['sorts']['field_p_erating_value']['field'] = 'field_p_erating_value';
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  $handler->display->display_options['defaults']['filters'] = FALSE;
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'provider' => 'provider',
  );
  /* Filter criterion: Content: Service Types Available (field_p_types) */
  $handler->display->display_options['filters']['field_p_types_value']['id'] = 'field_p_types_value';
  $handler->display->display_options['filters']['field_p_types_value']['table'] = 'field_data_field_p_types';
  $handler->display->display_options['filters']['field_p_types_value']['field'] = 'field_p_types_value';
  $handler->display->display_options['filters']['field_p_types_value']['value'] = array(
    'residential' => 'residential',
  );
  /* Filter criterion: Content: Listing Position (field_p_erating) */
  $handler->display->display_options['filters']['field_p_erating_value']['id'] = 'field_p_erating_value';
  $handler->display->display_options['filters']['field_p_erating_value']['table'] = 'field_data_field_p_erating';
  $handler->display->display_options['filters']['field_p_erating_value']['field'] = 'field_p_erating_value';
  $handler->display->display_options['filters']['field_p_erating_value']['operator'] = 'not empty';
  $handler->display->display_options['path'] = 'compare-residential-voip-providers-old';

  /* Display: Block - T-Pick business */
  $handler = $view->new_display('block', 'Block - T-Pick business', 'block_pick_bu');
  $handler->display->display_options['defaults']['title'] = FALSE;
  $handler->display->display_options['title'] = 'Top Pick Business VoIP Providers';
  $handler->display->display_options['display_description'] = 'Top pick business providers';
  $handler->display->display_options['defaults']['use_more'] = FALSE;
  $handler->display->display_options['use_more_always'] = TRUE;
  $handler->display->display_options['use_more_text'] = 'View all >>';
  $handler->display->display_options['defaults']['link_display'] = FALSE;
  $handler->display->display_options['link_display'] = 'page_p_bu';
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'some';
  $handler->display->display_options['pager']['options']['items_per_page'] = '3';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'table';
  $handler->display->display_options['style_options']['columns'] = array(
    'title' => 'title',
    'field_p_logo' => 'field_p_logo',
    'php_2' => 'php_2',
    'value' => 'value',
    'value_1' => 'value_1',
    'php_4' => 'php_4',
    'php_5' => 'php_5',
  );
  $handler->display->display_options['style_options']['default'] = '-1';
  $handler->display->display_options['style_options']['info'] = array(
    'title' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'field_p_logo' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php_2' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'value' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'value_1' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php_4' => array(
      'sortable' => 0,
      'default_sort_order' => 'desc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php_5' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
  );
  $handler->display->display_options['style_options']['override'] = 1;
  $handler->display->display_options['style_options']['sticky'] = 0;
  $handler->display->display_options['style_options']['empty_table'] = 0;
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['exclude'] = TRUE;
  $handler->display->display_options['fields']['title']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['title']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['title']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['title']['alter']['external'] = 0;
  $handler->display->display_options['fields']['title']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['title']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['title']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = 0;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = 0;
  $handler->display->display_options['fields']['title']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['title']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['title']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['title']['alter']['html'] = 0;
  $handler->display->display_options['fields']['title']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['title']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['title']['hide_empty'] = 0;
  $handler->display->display_options['fields']['title']['empty_zero'] = 0;
  $handler->display->display_options['fields']['title']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['title']['link_to_node'] = 1;
  /* Field: Content: Logo */
  $handler->display->display_options['fields']['field_p_logo']['id'] = 'field_p_logo';
  $handler->display->display_options['fields']['field_p_logo']['table'] = 'field_data_field_p_logo';
  $handler->display->display_options['fields']['field_p_logo']['field'] = 'field_p_logo';
  $handler->display->display_options['fields']['field_p_logo']['label'] = '';
  $handler->display->display_options['fields']['field_p_logo']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['external'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['html'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_p_logo']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['empty'] = '[title]';
  $handler->display->display_options['fields']['field_p_logo']['hide_empty'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['empty_zero'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['hide_alter_empty'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_p_logo']['settings'] = array(
    'image_style' => 'thumbnail',
    'image_link' => 'content',
  );
  $handler->display->display_options['fields']['field_p_logo']['field_api_classes'] = 0;
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_2']['id'] = 'php_2';
  $handler->display->display_options['fields']['php_2']['table'] = 'views';
  $handler->display->display_options['fields']['php_2']['field'] = 'php';
  $handler->display->display_options['fields']['php_2']['label'] = '';
  $handler->display->display_options['fields']['php_2']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_2']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_2']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_2']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['php_2']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_2']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_2']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_2']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_2']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_2']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'monthly\', array(\'data\' => $data, \'service_type\' =>\'bu\'));
  return $value;';
  $handler->display->display_options['fields']['php_2']['php_output'] = '<?php
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php_2']['use_php_click_sortable'] = '3';
  $handler->display->display_options['fields']['php_2']['php_click_sortable'] = '';
  /* Field: Vote results: Value */
  $handler->display->display_options['fields']['value']['id'] = 'value';
  $handler->display->display_options['fields']['value']['table'] = 'votingapi_cache';
  $handler->display->display_options['fields']['value']['field'] = 'value';
  $handler->display->display_options['fields']['value']['relationship'] = 'votingapi_cache';
  $handler->display->display_options['fields']['value']['label'] = '';
  $handler->display->display_options['fields']['value']['exclude'] = TRUE;
  $handler->display->display_options['fields']['value']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['value']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['value']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['value']['alter']['external'] = 0;
  $handler->display->display_options['fields']['value']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['value']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['value']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['value']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['value']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['value']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['value']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['value']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['value']['alter']['html'] = 0;
  $handler->display->display_options['fields']['value']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['value']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['value']['hide_empty'] = 0;
  $handler->display->display_options['fields']['value']['empty_zero'] = 0;
  $handler->display->display_options['fields']['value']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['value']['set_precision'] = 0;
  $handler->display->display_options['fields']['value']['precision'] = '0';
  $handler->display->display_options['fields']['value']['format_plural'] = 0;
  /* Field: Vote results: Value */
  $handler->display->display_options['fields']['value_1']['id'] = 'value_1';
  $handler->display->display_options['fields']['value_1']['table'] = 'votingapi_cache';
  $handler->display->display_options['fields']['value_1']['field'] = 'value';
  $handler->display->display_options['fields']['value_1']['relationship'] = 'votingapi_cache_1';
  $handler->display->display_options['fields']['value_1']['label'] = 'Value Counts';
  $handler->display->display_options['fields']['value_1']['exclude'] = TRUE;
  $handler->display->display_options['fields']['value_1']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['external'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['value_1']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['value_1']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['html'] = 0;
  $handler->display->display_options['fields']['value_1']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['value_1']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['value_1']['hide_empty'] = 0;
  $handler->display->display_options['fields']['value_1']['empty_zero'] = 0;
  $handler->display->display_options['fields']['value_1']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['value_1']['set_precision'] = 0;
  $handler->display->display_options['fields']['value_1']['precision'] = '0';
  $handler->display->display_options['fields']['value_1']['format_plural'] = 0;
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_4']['id'] = 'php_4';
  $handler->display->display_options['fields']['php_4']['table'] = 'views';
  $handler->display->display_options['fields']['php_4']['field'] = 'php';
  $handler->display->display_options['fields']['php_4']['label'] = '';
  $handler->display->display_options['fields']['php_4']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_4']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_4']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_4']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['php_4']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_4']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_4']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_4']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_4']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_4']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'rating\', array(\'data\' => $data));
  return $value;';
  $handler->display->display_options['fields']['php_4']['php_output'] = '<?php
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php_4']['use_php_click_sortable'] = '6';
  $handler->display->display_options['fields']['php_4']['php_click_sortable'] = 'if ($row1->value >= $row2->value) {
    return 1;
  }
  else {
    return -1;
  }';
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_5']['id'] = 'php_5';
  $handler->display->display_options['fields']['php_5']['table'] = 'views';
  $handler->display->display_options['fields']['php_5']['field'] = 'php';
  $handler->display->display_options['fields']['php_5']['label'] = '';
  $handler->display->display_options['fields']['php_5']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_5']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_5']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_5']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['php_5']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_5']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_5']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_5']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_5']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_5']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'i_web\', array(\'data\' => $data));
  return $value;';
  $handler->display->display_options['fields']['php_5']['php_output'] = '<?php 
  echo \'<a href="\' . $value . \'" class="site" target="_blank">\' . t(\'Visit Site\') . \'</a>\';
  ?>';
  $handler->display->display_options['fields']['php_5']['use_php_click_sortable'] = '3';
  $handler->display->display_options['fields']['php_5']['php_click_sortable'] = '';
  $handler->display->display_options['defaults']['sorts'] = FALSE;
  /* Sort criterion: Content: Listing Position (field_p_erating) */
  $handler->display->display_options['sorts']['field_p_erating_value']['id'] = 'field_p_erating_value';
  $handler->display->display_options['sorts']['field_p_erating_value']['table'] = 'field_data_field_p_erating';
  $handler->display->display_options['sorts']['field_p_erating_value']['field'] = 'field_p_erating_value';
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  $handler->display->display_options['defaults']['filters'] = FALSE;
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'provider' => 'provider',
  );
  /* Filter criterion: Content: Service Types Available (field_p_types) */
  $handler->display->display_options['filters']['field_p_types_value']['id'] = 'field_p_types_value';
  $handler->display->display_options['filters']['field_p_types_value']['table'] = 'field_data_field_p_types';
  $handler->display->display_options['filters']['field_p_types_value']['field'] = 'field_p_types_value';
  $handler->display->display_options['filters']['field_p_types_value']['value'] = array(
    'business' => 'business',
  );
  /* Filter criterion: Content: Listing Position (field_p_erating) */
  $handler->display->display_options['filters']['field_p_erating_value']['id'] = 'field_p_erating_value';
  $handler->display->display_options['filters']['field_p_erating_value']['table'] = 'field_data_field_p_erating';
  $handler->display->display_options['filters']['field_p_erating_value']['field'] = 'field_p_erating_value';
  $handler->display->display_options['filters']['field_p_erating_value']['operator'] = 'not empty';

  /* Display: Block - T-Pick residential */
  $handler = $view->new_display('block', 'Block - T-Pick residential', 'block_pick_re');
  $handler->display->display_options['defaults']['title'] = FALSE;
  $handler->display->display_options['title'] = 'Top Pick Residential VoIP Providers';
  $handler->display->display_options['display_description'] = 'Top pick residential providers';
  $handler->display->display_options['defaults']['use_more'] = FALSE;
  $handler->display->display_options['use_more_always'] = TRUE;
  $handler->display->display_options['use_more_text'] = 'View all >>';
  $handler->display->display_options['defaults']['link_display'] = FALSE;
  $handler->display->display_options['link_display'] = 'page_p_re';
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'some';
  $handler->display->display_options['pager']['options']['items_per_page'] = '3';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'table';
  $handler->display->display_options['style_options']['columns'] = array(
    'title' => 'title',
    'field_p_logo' => 'field_p_logo',
    'php_2' => 'php_2',
    'value' => 'value',
    'value_1' => 'value_1',
    'php_4' => 'php_4',
    'php_5' => 'php_5',
  );
  $handler->display->display_options['style_options']['default'] = '-1';
  $handler->display->display_options['style_options']['info'] = array(
    'title' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'field_p_logo' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php_2' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'value' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'value_1' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php_4' => array(
      'sortable' => 0,
      'default_sort_order' => 'desc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php_5' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
  );
  $handler->display->display_options['style_options']['override'] = 1;
  $handler->display->display_options['style_options']['sticky'] = 0;
  $handler->display->display_options['style_options']['empty_table'] = 0;
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['exclude'] = TRUE;
  $handler->display->display_options['fields']['title']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['title']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['title']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['title']['alter']['external'] = 0;
  $handler->display->display_options['fields']['title']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['title']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['title']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = 0;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = 0;
  $handler->display->display_options['fields']['title']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['title']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['title']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['title']['alter']['html'] = 0;
  $handler->display->display_options['fields']['title']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['title']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['title']['hide_empty'] = 0;
  $handler->display->display_options['fields']['title']['empty_zero'] = 0;
  $handler->display->display_options['fields']['title']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['title']['link_to_node'] = 1;
  /* Field: Content: Logo */
  $handler->display->display_options['fields']['field_p_logo']['id'] = 'field_p_logo';
  $handler->display->display_options['fields']['field_p_logo']['table'] = 'field_data_field_p_logo';
  $handler->display->display_options['fields']['field_p_logo']['field'] = 'field_p_logo';
  $handler->display->display_options['fields']['field_p_logo']['label'] = '';
  $handler->display->display_options['fields']['field_p_logo']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['external'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['html'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_p_logo']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['empty'] = '[title]';
  $handler->display->display_options['fields']['field_p_logo']['hide_empty'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['empty_zero'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['hide_alter_empty'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_p_logo']['settings'] = array(
    'image_style' => 'thumbnail',
    'image_link' => 'content',
  );
  $handler->display->display_options['fields']['field_p_logo']['field_api_classes'] = 0;
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_2']['id'] = 'php_2';
  $handler->display->display_options['fields']['php_2']['table'] = 'views';
  $handler->display->display_options['fields']['php_2']['field'] = 'php';
  $handler->display->display_options['fields']['php_2']['label'] = '';
  $handler->display->display_options['fields']['php_2']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_2']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_2']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_2']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['php_2']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_2']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_2']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_2']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_2']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_2']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'monthly\', array(\'data\' => $data, \'service_type\' =>\'re\'));
  return $value;';
  $handler->display->display_options['fields']['php_2']['php_output'] = '<?php
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php_2']['use_php_click_sortable'] = '3';
  $handler->display->display_options['fields']['php_2']['php_click_sortable'] = '';
  /* Field: Vote results: Value */
  $handler->display->display_options['fields']['value']['id'] = 'value';
  $handler->display->display_options['fields']['value']['table'] = 'votingapi_cache';
  $handler->display->display_options['fields']['value']['field'] = 'value';
  $handler->display->display_options['fields']['value']['relationship'] = 'votingapi_cache';
  $handler->display->display_options['fields']['value']['label'] = '';
  $handler->display->display_options['fields']['value']['exclude'] = TRUE;
  $handler->display->display_options['fields']['value']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['value']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['value']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['value']['alter']['external'] = 0;
  $handler->display->display_options['fields']['value']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['value']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['value']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['value']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['value']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['value']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['value']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['value']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['value']['alter']['html'] = 0;
  $handler->display->display_options['fields']['value']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['value']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['value']['hide_empty'] = 0;
  $handler->display->display_options['fields']['value']['empty_zero'] = 0;
  $handler->display->display_options['fields']['value']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['value']['set_precision'] = 0;
  $handler->display->display_options['fields']['value']['precision'] = '0';
  $handler->display->display_options['fields']['value']['format_plural'] = 0;
  /* Field: Vote results: Value */
  $handler->display->display_options['fields']['value_1']['id'] = 'value_1';
  $handler->display->display_options['fields']['value_1']['table'] = 'votingapi_cache';
  $handler->display->display_options['fields']['value_1']['field'] = 'value';
  $handler->display->display_options['fields']['value_1']['relationship'] = 'votingapi_cache_1';
  $handler->display->display_options['fields']['value_1']['label'] = 'Value Counts';
  $handler->display->display_options['fields']['value_1']['exclude'] = TRUE;
  $handler->display->display_options['fields']['value_1']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['external'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['value_1']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['value_1']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['html'] = 0;
  $handler->display->display_options['fields']['value_1']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['value_1']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['value_1']['hide_empty'] = 0;
  $handler->display->display_options['fields']['value_1']['empty_zero'] = 0;
  $handler->display->display_options['fields']['value_1']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['value_1']['set_precision'] = 0;
  $handler->display->display_options['fields']['value_1']['precision'] = '0';
  $handler->display->display_options['fields']['value_1']['format_plural'] = 0;
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_4']['id'] = 'php_4';
  $handler->display->display_options['fields']['php_4']['table'] = 'views';
  $handler->display->display_options['fields']['php_4']['field'] = 'php';
  $handler->display->display_options['fields']['php_4']['label'] = '';
  $handler->display->display_options['fields']['php_4']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_4']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_4']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_4']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['php_4']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_4']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_4']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_4']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_4']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_4']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'rating\', array(\'data\' => $data));
  return $value;';
  $handler->display->display_options['fields']['php_4']['php_output'] = '<?php
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php_4']['use_php_click_sortable'] = '6';
  $handler->display->display_options['fields']['php_4']['php_click_sortable'] = 'if ($row1->value >= $row2->value) {
    return 1;
  }
  else {
    return -1;
  }';
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_5']['id'] = 'php_5';
  $handler->display->display_options['fields']['php_5']['table'] = 'views';
  $handler->display->display_options['fields']['php_5']['field'] = 'php';
  $handler->display->display_options['fields']['php_5']['label'] = '';
  $handler->display->display_options['fields']['php_5']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_5']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_5']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_5']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['php_5']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_5']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_5']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_5']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_5']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_5']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'i_web\', array(\'data\' => $data));
  return $value;';
  $handler->display->display_options['fields']['php_5']['php_output'] = '<?php 
  echo \'<a href="\' . $value . \'" class="site" target="_blank">\' . t(\'Visit Site\') . \'</a>\';
  ?>';
  $handler->display->display_options['fields']['php_5']['use_php_click_sortable'] = '3';
  $handler->display->display_options['fields']['php_5']['php_click_sortable'] = '';
  $handler->display->display_options['defaults']['sorts'] = FALSE;
  /* Sort criterion: Content: Listing Position (field_p_erating) */
  $handler->display->display_options['sorts']['field_p_erating_value']['id'] = 'field_p_erating_value';
  $handler->display->display_options['sorts']['field_p_erating_value']['table'] = 'field_data_field_p_erating';
  $handler->display->display_options['sorts']['field_p_erating_value']['field'] = 'field_p_erating_value';
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  $handler->display->display_options['defaults']['filters'] = FALSE;
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'provider' => 'provider',
  );
  /* Filter criterion: Content: Service Types Available (field_p_types) */
  $handler->display->display_options['filters']['field_p_types_value']['id'] = 'field_p_types_value';
  $handler->display->display_options['filters']['field_p_types_value']['table'] = 'field_data_field_p_types';
  $handler->display->display_options['filters']['field_p_types_value']['field'] = 'field_p_types_value';
  $handler->display->display_options['filters']['field_p_types_value']['value'] = array(
    'residential' => 'residential',
  );
  /* Filter criterion: Content: Listing Position (field_p_erating) */
  $handler->display->display_options['filters']['field_p_erating_value']['id'] = 'field_p_erating_value';
  $handler->display->display_options['filters']['field_p_erating_value']['table'] = 'field_data_field_p_erating';
  $handler->display->display_options['filters']['field_p_erating_value']['field'] = 'field_p_erating_value';
  $handler->display->display_options['filters']['field_p_erating_value']['operator'] = 'not empty';

  /* Display: Block - Page Residential */
  $handler = $view->new_display('block', 'Block - Page Residential', 'block_p_re_page');
  $handler->display->display_options['defaults']['title'] = FALSE;
  $handler->display->display_options['title'] = 'Compare Top Pick Residential VoIP Providers (Page)';
  $handler->display->display_options['display_description'] = 'Block for Page with Residential providers';
  $handler->display->display_options['defaults']['use_more'] = FALSE;
  $handler->display->display_options['use_more_always'] = TRUE;
  $handler->display->display_options['use_more_text'] = 'View All Residential VoIP Providers >>';
  $handler->display->display_options['defaults']['link_display'] = FALSE;
  $handler->display->display_options['link_display'] = 'page_p_re';
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '12';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['pager']['options']['id'] = '0';
  $handler->display->display_options['pager']['options']['expose']['items_per_page_options_all'] = 0;
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'table';
  $handler->display->display_options['style_options']['columns'] = array(
    'title' => 'title',
    'field_p_logo' => 'field_p_logo',
    'php' => 'php',
    'php_3' => 'php_3',
    'php_2' => 'php_2',
    'php_1' => 'php_1',
    'value' => 'value',
    'value_1' => 'value_1',
    'php_4' => 'php_4',
    'php_5' => 'php_5',
  );
  $handler->display->display_options['style_options']['default'] = '-1';
  $handler->display->display_options['style_options']['info'] = array(
    'title' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'field_p_logo' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php' => array(
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php_3' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php_2' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php_1' => array(
      'sortable' => 0,
      'default_sort_order' => 'desc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'value' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'value_1' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php_4' => array(
      'sortable' => 0,
      'default_sort_order' => 'desc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php_5' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
  );
  $handler->display->display_options['style_options']['override'] = 1;
  $handler->display->display_options['style_options']['sticky'] = 0;
  $handler->display->display_options['style_options']['empty_table'] = 0;
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['exclude'] = TRUE;
  $handler->display->display_options['fields']['title']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['title']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['title']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['title']['alter']['external'] = 0;
  $handler->display->display_options['fields']['title']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['title']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['title']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = 0;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = 0;
  $handler->display->display_options['fields']['title']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['title']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['title']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['title']['alter']['html'] = 0;
  $handler->display->display_options['fields']['title']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['title']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['title']['hide_empty'] = 0;
  $handler->display->display_options['fields']['title']['empty_zero'] = 0;
  $handler->display->display_options['fields']['title']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['title']['link_to_node'] = 1;
  /* Field: Content: Logo */
  $handler->display->display_options['fields']['field_p_logo']['id'] = 'field_p_logo';
  $handler->display->display_options['fields']['field_p_logo']['table'] = 'field_data_field_p_logo';
  $handler->display->display_options['fields']['field_p_logo']['field'] = 'field_p_logo';
  $handler->display->display_options['fields']['field_p_logo']['label'] = 'VoIP Provider';
  $handler->display->display_options['fields']['field_p_logo']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['external'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['html'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['empty'] = '[title]';
  $handler->display->display_options['fields']['field_p_logo']['hide_empty'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['empty_zero'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['hide_alter_empty'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_p_logo']['settings'] = array(
    'image_style' => 'logo_provider_chart_main',
    'image_link' => 'content',
  );
  $handler->display->display_options['fields']['field_p_logo']['field_api_classes'] = 0;
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php']['id'] = 'php';
  $handler->display->display_options['fields']['php']['table'] = 'views';
  $handler->display->display_options['fields']['php']['field'] = 'php';
  $handler->display->display_options['fields']['php']['label'] = 'Plan Features';
  $handler->display->display_options['fields']['php']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'features\', array(\'data\' => $data, \'service_type\' =>\'re\'));
  return $value;';
  $handler->display->display_options['fields']['php']['php_output'] = '<?php
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php']['use_php_click_sortable'] = '0';
  $handler->display->display_options['fields']['php']['php_click_sortable'] = '';
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_3']['id'] = 'php_3';
  $handler->display->display_options['fields']['php_3']['table'] = 'views';
  $handler->display->display_options['fields']['php_3']['field'] = 'php';
  $handler->display->display_options['fields']['php_3']['label'] = 'Setup Costs';
  $handler->display->display_options['fields']['php_3']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_3']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_3']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_3']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php_3']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_3']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_3']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_3']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_3']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_3']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'setup\', array(\'data\' => $data, \'service_type\' =>\'re\'));
  return $value;';
  $handler->display->display_options['fields']['php_3']['php_output'] = '<?php 
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php_3']['use_php_click_sortable'] = '3';
  $handler->display->display_options['fields']['php_3']['php_click_sortable'] = '';
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_2']['id'] = 'php_2';
  $handler->display->display_options['fields']['php_2']['table'] = 'views';
  $handler->display->display_options['fields']['php_2']['field'] = 'php';
  $handler->display->display_options['fields']['php_2']['label'] = 'Monthly Price';
  $handler->display->display_options['fields']['php_2']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_2']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_2']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_2']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php_2']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_2']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_2']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_2']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_2']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_2']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'monthly\', array(\'data\' => $data, \'service_type\' =>\'re\'));
  return $value;';
  $handler->display->display_options['fields']['php_2']['php_output'] = '<?php
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php_2']['use_php_click_sortable'] = '3';
  $handler->display->display_options['fields']['php_2']['php_click_sortable'] = '';
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_1']['id'] = 'php_1';
  $handler->display->display_options['fields']['php_1']['table'] = 'views';
  $handler->display->display_options['fields']['php_1']['field'] = 'php';
  $handler->display->display_options['fields']['php_1']['label'] = 'Money Back Guarantee';
  $handler->display->display_options['fields']['php_1']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_1']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_1']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_1']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php_1']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_1']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_1']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_1']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_1']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_1']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'back\', array(\'data\' => $data, \'service_type\' =>\'re\'));
  return $value;';
  $handler->display->display_options['fields']['php_1']['php_output'] = '<?php 
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php_1']['use_php_click_sortable'] = '3';
  $handler->display->display_options['fields']['php_1']['php_click_sortable'] = '';
  /* Field: Vote results: Value */
  $handler->display->display_options['fields']['value']['id'] = 'value';
  $handler->display->display_options['fields']['value']['table'] = 'votingapi_cache';
  $handler->display->display_options['fields']['value']['field'] = 'value';
  $handler->display->display_options['fields']['value']['relationship'] = 'votingapi_cache';
  $handler->display->display_options['fields']['value']['label'] = '';
  $handler->display->display_options['fields']['value']['exclude'] = TRUE;
  $handler->display->display_options['fields']['value']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['value']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['value']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['value']['alter']['external'] = 0;
  $handler->display->display_options['fields']['value']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['value']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['value']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['value']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['value']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['value']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['value']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['value']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['value']['alter']['html'] = 0;
  $handler->display->display_options['fields']['value']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['value']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['value']['hide_empty'] = 0;
  $handler->display->display_options['fields']['value']['empty_zero'] = 0;
  $handler->display->display_options['fields']['value']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['value']['set_precision'] = 0;
  $handler->display->display_options['fields']['value']['precision'] = '0';
  $handler->display->display_options['fields']['value']['format_plural'] = 0;
  /* Field: Vote results: Value */
  $handler->display->display_options['fields']['value_1']['id'] = 'value_1';
  $handler->display->display_options['fields']['value_1']['table'] = 'votingapi_cache';
  $handler->display->display_options['fields']['value_1']['field'] = 'value';
  $handler->display->display_options['fields']['value_1']['relationship'] = 'votingapi_cache_1';
  $handler->display->display_options['fields']['value_1']['label'] = 'Value Counts';
  $handler->display->display_options['fields']['value_1']['exclude'] = TRUE;
  $handler->display->display_options['fields']['value_1']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['external'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['value_1']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['value_1']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['html'] = 0;
  $handler->display->display_options['fields']['value_1']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['value_1']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['value_1']['hide_empty'] = 0;
  $handler->display->display_options['fields']['value_1']['empty_zero'] = 0;
  $handler->display->display_options['fields']['value_1']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['value_1']['set_precision'] = 0;
  $handler->display->display_options['fields']['value_1']['precision'] = '0';
  $handler->display->display_options['fields']['value_1']['format_plural'] = 0;
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_4']['id'] = 'php_4';
  $handler->display->display_options['fields']['php_4']['table'] = 'views';
  $handler->display->display_options['fields']['php_4']['field'] = 'php';
  $handler->display->display_options['fields']['php_4']['label'] = 'User Ratings & Reviews';
  $handler->display->display_options['fields']['php_4']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_4']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_4']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_4']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php_4']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_4']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_4']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_4']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_4']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_4']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'rating\', array(\'data\' => $data));
  return $value;';
  $handler->display->display_options['fields']['php_4']['php_output'] = '<?php
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php_4']['use_php_click_sortable'] = '6';
  $handler->display->display_options['fields']['php_4']['php_click_sortable'] = 'if ($row1->value >= $row2->value) {
    return 1;
  }
  else {
    return -1;
  }';
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_5']['id'] = 'php_5';
  $handler->display->display_options['fields']['php_5']['table'] = 'views';
  $handler->display->display_options['fields']['php_5']['field'] = 'php';
  $handler->display->display_options['fields']['php_5']['label'] = 'Visit Provider';
  $handler->display->display_options['fields']['php_5']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_5']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_5']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_5']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php_5']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_5']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_5']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_5']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_5']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_5']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'i_web\', array(\'data\' => $data));
  return $value;';
  $handler->display->display_options['fields']['php_5']['php_output'] = '<?php 
  echo \'<a href="\' . $value . \'" class="site" target="_blank">\' . t(\'Visit Site\') . \'</a>\';
  ?>';
  $handler->display->display_options['fields']['php_5']['use_php_click_sortable'] = '3';
  $handler->display->display_options['fields']['php_5']['php_click_sortable'] = '';
  $handler->display->display_options['defaults']['sorts'] = FALSE;
  /* Sort criterion: Content: Listing Position (field_p_erating) */
  $handler->display->display_options['sorts']['field_p_erating_value']['id'] = 'field_p_erating_value';
  $handler->display->display_options['sorts']['field_p_erating_value']['table'] = 'field_data_field_p_erating';
  $handler->display->display_options['sorts']['field_p_erating_value']['field'] = 'field_p_erating_value';
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  $handler->display->display_options['defaults']['filters'] = FALSE;
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'provider' => 'provider',
  );
  /* Filter criterion: Content: Service Types Available (field_p_types) */
  $handler->display->display_options['filters']['field_p_types_value']['id'] = 'field_p_types_value';
  $handler->display->display_options['filters']['field_p_types_value']['table'] = 'field_data_field_p_types';
  $handler->display->display_options['filters']['field_p_types_value']['field'] = 'field_p_types_value';
  $handler->display->display_options['filters']['field_p_types_value']['value'] = array(
    'residential' => 'residential',
  );
  /* Filter criterion: Content: Listing Position (field_p_erating) */
  $handler->display->display_options['filters']['field_p_erating_value']['id'] = 'field_p_erating_value';
  $handler->display->display_options['filters']['field_p_erating_value']['table'] = 'field_data_field_p_erating';
  $handler->display->display_options['filters']['field_p_erating_value']['field'] = 'field_p_erating_value';
  $handler->display->display_options['filters']['field_p_erating_value']['operator'] = 'not empty';

  /* Display: Block - Page Business */
  $handler = $view->new_display('block', 'Block - Page Business', 'block_p_bu_page');
  $handler->display->display_options['defaults']['title'] = FALSE;
  $handler->display->display_options['title'] = 'Compare Top Pick Business VoIP Providers (page)';
  $handler->display->display_options['display_description'] = 'Top business providers block for page';
  $handler->display->display_options['defaults']['use_more'] = FALSE;
  $handler->display->display_options['use_more_always'] = TRUE;
  $handler->display->display_options['use_more_text'] = 'View All Business VoIP Providers >>';
  $handler->display->display_options['defaults']['link_display'] = FALSE;
  $handler->display->display_options['link_display'] = 'page_p_bu';
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '12';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['pager']['options']['id'] = '0';
  $handler->display->display_options['pager']['options']['expose']['items_per_page_options_all'] = 0;
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'table';
  $handler->display->display_options['style_options']['columns'] = array(
    'title' => 'title',
    'field_p_logo' => 'field_p_logo',
    'php' => 'php',
    'php_3' => 'php_3',
    'php_2' => 'php_2',
    'php_1' => 'php_1',
    'value' => 'value',
    'value_1' => 'value_1',
    'php_4' => 'php_4',
    'php_5' => 'php_5',
  );
  $handler->display->display_options['style_options']['default'] = '-1';
  $handler->display->display_options['style_options']['info'] = array(
    'title' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'field_p_logo' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php' => array(
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php_3' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php_2' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php_1' => array(
      'sortable' => 0,
      'default_sort_order' => 'desc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'value' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'value_1' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php_4' => array(
      'sortable' => 0,
      'default_sort_order' => 'desc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'php_5' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
  );
  $handler->display->display_options['style_options']['override'] = 1;
  $handler->display->display_options['style_options']['sticky'] = 0;
  $handler->display->display_options['style_options']['empty_table'] = 0;
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['exclude'] = TRUE;
  $handler->display->display_options['fields']['title']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['title']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['title']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['title']['alter']['external'] = 0;
  $handler->display->display_options['fields']['title']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['title']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['title']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = 0;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = 0;
  $handler->display->display_options['fields']['title']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['title']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['title']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['title']['alter']['html'] = 0;
  $handler->display->display_options['fields']['title']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['title']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['title']['hide_empty'] = 0;
  $handler->display->display_options['fields']['title']['empty_zero'] = 0;
  $handler->display->display_options['fields']['title']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['title']['link_to_node'] = 1;
  /* Field: Content: Logo */
  $handler->display->display_options['fields']['field_p_logo']['id'] = 'field_p_logo';
  $handler->display->display_options['fields']['field_p_logo']['table'] = 'field_data_field_p_logo';
  $handler->display->display_options['fields']['field_p_logo']['field'] = 'field_p_logo';
  $handler->display->display_options['fields']['field_p_logo']['label'] = 'VoIP Provider';
  $handler->display->display_options['fields']['field_p_logo']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['external'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['alter']['html'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['empty'] = '[title]';
  $handler->display->display_options['fields']['field_p_logo']['hide_empty'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['empty_zero'] = 1;
  $handler->display->display_options['fields']['field_p_logo']['hide_alter_empty'] = 0;
  $handler->display->display_options['fields']['field_p_logo']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_p_logo']['settings'] = array(
    'image_style' => 'logo_provider_chart_main',
    'image_link' => 'content',
  );
  $handler->display->display_options['fields']['field_p_logo']['field_api_classes'] = 0;
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php']['id'] = 'php';
  $handler->display->display_options['fields']['php']['table'] = 'views';
  $handler->display->display_options['fields']['php']['field'] = 'php';
  $handler->display->display_options['fields']['php']['label'] = 'Plan Features';
  $handler->display->display_options['fields']['php']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'features\', array(\'data\' => $data, \'service_type\' =>\'bu\'));
  return $value;';
  $handler->display->display_options['fields']['php']['php_output'] = '<?php
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php']['use_php_click_sortable'] = '0';
  $handler->display->display_options['fields']['php']['php_click_sortable'] = '';
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_3']['id'] = 'php_3';
  $handler->display->display_options['fields']['php_3']['table'] = 'views';
  $handler->display->display_options['fields']['php_3']['field'] = 'php';
  $handler->display->display_options['fields']['php_3']['label'] = 'Setup Costs';
  $handler->display->display_options['fields']['php_3']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_3']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_3']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_3']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_3']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php_3']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_3']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_3']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_3']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_3']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_3']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'setup\', array(\'data\' => $data, \'service_type\' =>\'bu\'));
  return $value;';
  $handler->display->display_options['fields']['php_3']['php_output'] = '<?php 
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php_3']['use_php_click_sortable'] = '3';
  $handler->display->display_options['fields']['php_3']['php_click_sortable'] = '';
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_2']['id'] = 'php_2';
  $handler->display->display_options['fields']['php_2']['table'] = 'views';
  $handler->display->display_options['fields']['php_2']['field'] = 'php';
  $handler->display->display_options['fields']['php_2']['label'] = 'Monthly Price';
  $handler->display->display_options['fields']['php_2']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_2']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_2']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_2']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_2']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php_2']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_2']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_2']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_2']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_2']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_2']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'monthly\', array(\'data\' => $data, \'service_type\' =>\'bu\'));
  return $value;';
  $handler->display->display_options['fields']['php_2']['php_output'] = '<?php
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php_2']['use_php_click_sortable'] = '3';
  $handler->display->display_options['fields']['php_2']['php_click_sortable'] = '';
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_1']['id'] = 'php_1';
  $handler->display->display_options['fields']['php_1']['table'] = 'views';
  $handler->display->display_options['fields']['php_1']['field'] = 'php';
  $handler->display->display_options['fields']['php_1']['label'] = 'Money Back Guarantee';
  $handler->display->display_options['fields']['php_1']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_1']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_1']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_1']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_1']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php_1']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_1']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_1']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_1']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_1']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_1']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'back\', array(\'data\' => $data, \'service_type\' =>\'bu\'));
  return $value;';
  $handler->display->display_options['fields']['php_1']['php_output'] = '<?php 
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php_1']['use_php_click_sortable'] = '3';
  $handler->display->display_options['fields']['php_1']['php_click_sortable'] = '';
  /* Field: Vote results: Value */
  $handler->display->display_options['fields']['value']['id'] = 'value';
  $handler->display->display_options['fields']['value']['table'] = 'votingapi_cache';
  $handler->display->display_options['fields']['value']['field'] = 'value';
  $handler->display->display_options['fields']['value']['relationship'] = 'votingapi_cache';
  $handler->display->display_options['fields']['value']['label'] = '';
  $handler->display->display_options['fields']['value']['exclude'] = TRUE;
  $handler->display->display_options['fields']['value']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['value']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['value']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['value']['alter']['external'] = 0;
  $handler->display->display_options['fields']['value']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['value']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['value']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['value']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['value']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['value']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['value']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['value']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['value']['alter']['html'] = 0;
  $handler->display->display_options['fields']['value']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['value']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['value']['hide_empty'] = 0;
  $handler->display->display_options['fields']['value']['empty_zero'] = 0;
  $handler->display->display_options['fields']['value']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['value']['set_precision'] = 0;
  $handler->display->display_options['fields']['value']['precision'] = '0';
  $handler->display->display_options['fields']['value']['format_plural'] = 0;
  /* Field: Vote results: Value */
  $handler->display->display_options['fields']['value_1']['id'] = 'value_1';
  $handler->display->display_options['fields']['value_1']['table'] = 'votingapi_cache';
  $handler->display->display_options['fields']['value_1']['field'] = 'value';
  $handler->display->display_options['fields']['value_1']['relationship'] = 'votingapi_cache_1';
  $handler->display->display_options['fields']['value_1']['label'] = 'Value Counts';
  $handler->display->display_options['fields']['value_1']['exclude'] = TRUE;
  $handler->display->display_options['fields']['value_1']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['external'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['value_1']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['value_1']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['value_1']['alter']['html'] = 0;
  $handler->display->display_options['fields']['value_1']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['value_1']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['value_1']['hide_empty'] = 0;
  $handler->display->display_options['fields']['value_1']['empty_zero'] = 0;
  $handler->display->display_options['fields']['value_1']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['value_1']['set_precision'] = 0;
  $handler->display->display_options['fields']['value_1']['precision'] = '0';
  $handler->display->display_options['fields']['value_1']['format_plural'] = 0;
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_4']['id'] = 'php_4';
  $handler->display->display_options['fields']['php_4']['table'] = 'views';
  $handler->display->display_options['fields']['php_4']['field'] = 'php';
  $handler->display->display_options['fields']['php_4']['label'] = 'User Ratings & Reviews';
  $handler->display->display_options['fields']['php_4']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_4']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_4']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_4']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_4']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php_4']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_4']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_4']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_4']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_4']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_4']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'rating\', array(\'data\' => $data));
  return $value;';
  $handler->display->display_options['fields']['php_4']['php_output'] = '<?php
  echo $value;
  ?>';
  $handler->display->display_options['fields']['php_4']['use_php_click_sortable'] = '6';
  $handler->display->display_options['fields']['php_4']['php_click_sortable'] = 'if ($row1->value >= $row2->value) {
    return 1;
  }
  else {
    return -1;
  }';
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php_5']['id'] = 'php_5';
  $handler->display->display_options['fields']['php_5']['table'] = 'views';
  $handler->display->display_options['fields']['php_5']['field'] = 'php';
  $handler->display->display_options['fields']['php_5']['label'] = 'Visit Provider';
  $handler->display->display_options['fields']['php_5']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['external'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['php_5']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['php_5']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['php_5']['alter']['html'] = 0;
  $handler->display->display_options['fields']['php_5']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['php_5']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['php_5']['hide_empty'] = 0;
  $handler->display->display_options['fields']['php_5']['empty_zero'] = 0;
  $handler->display->display_options['fields']['php_5']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['php_5']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php_5']['php_value'] = '$value = wdg_misc_getProviderQuickData(\'i_web\', array(\'data\' => $data));
  return $value;';
  $handler->display->display_options['fields']['php_5']['php_output'] = '<?php 
  echo \'<a href="\' . $value . \'" class="site" target="_blank">\' . t(\'Visit Site\') . \'</a>\';
  ?>';
  $handler->display->display_options['fields']['php_5']['use_php_click_sortable'] = '3';
  $handler->display->display_options['fields']['php_5']['php_click_sortable'] = '';
  $handler->display->display_options['defaults']['sorts'] = FALSE;
  /* Sort criterion: Content: Listing Position (field_p_erating) */
  $handler->display->display_options['sorts']['field_p_erating_value']['id'] = 'field_p_erating_value';
  $handler->display->display_options['sorts']['field_p_erating_value']['table'] = 'field_data_field_p_erating';
  $handler->display->display_options['sorts']['field_p_erating_value']['field'] = 'field_p_erating_value';
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  $handler->display->display_options['defaults']['filters'] = FALSE;
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'provider' => 'provider',
  );
  /* Filter criterion: Content: Service Types Available (field_p_types) */
  $handler->display->display_options['filters']['field_p_types_value']['id'] = 'field_p_types_value';
  $handler->display->display_options['filters']['field_p_types_value']['table'] = 'field_data_field_p_types';
  $handler->display->display_options['filters']['field_p_types_value']['field'] = 'field_p_types_value';
  $handler->display->display_options['filters']['field_p_types_value']['value'] = array(
    'business' => 'business',
  );
  /* Filter criterion: Content: Listing Position (field_p_erating) */
  $handler->display->display_options['filters']['field_p_erating_value']['id'] = 'field_p_erating_value';
  $handler->display->display_options['filters']['field_p_erating_value']['table'] = 'field_data_field_p_erating';
  $handler->display->display_options['filters']['field_p_erating_value']['field'] = 'field_p_erating_value';
  $handler->display->display_options['filters']['field_p_erating_value']['operator'] = 'not empty';

  $views[$view->name] = $view;
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  /* Reviews */
  /* ---------------------------------------------------------------- */
  
  $view = new view;
  $view->name = 'reviews';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'Reviews';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Reviews';
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['query']['options']['query_comment'] = FALSE;
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '3';
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['row_plugin'] = 'node';
  /* Relationship: Entity Reference: Referenced Entity */
  $handler->display->display_options['relationships']['field_ref_provider_target_id']['id'] = 'field_ref_provider_target_id';
  $handler->display->display_options['relationships']['field_ref_provider_target_id']['table'] = 'field_data_field_ref_provider';
  $handler->display->display_options['relationships']['field_ref_provider_target_id']['field'] = 'field_ref_provider_target_id';
  $handler->display->display_options['relationships']['field_ref_provider_target_id']['required'] = 1;
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['title']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['title']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = 0;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = 0;
  $handler->display->display_options['fields']['title']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['title']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['title']['alter']['html'] = 0;
  $handler->display->display_options['fields']['title']['hide_empty'] = 0;
  $handler->display->display_options['fields']['title']['empty_zero'] = 0;
  $handler->display->display_options['fields']['title']['link_to_node'] = 1;
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  $handler->display->display_options['sorts']['created']['exposed'] = TRUE;
  $handler->display->display_options['sorts']['created']['expose']['label'] = 'Post date';
  /* Sort criterion: Global: PHP */
  $handler->display->display_options['sorts']['php']['id'] = 'php';
  $handler->display->display_options['sorts']['php']['table'] = 'views';
  $handler->display->display_options['sorts']['php']['field'] = 'php';
  $handler->display->display_options['sorts']['php']['exposed'] = TRUE;
  $handler->display->display_options['sorts']['php']['expose']['label'] = 'PHP';
  /* Contextual filter: Content: Nid */
  $handler->display->display_options['arguments']['nid']['id'] = 'nid';
  $handler->display->display_options['arguments']['nid']['table'] = 'node';
  $handler->display->display_options['arguments']['nid']['field'] = 'nid';
  $handler->display->display_options['arguments']['nid']['relationship'] = 'field_ref_provider_target_id';
  $handler->display->display_options['arguments']['nid']['default_action'] = 'empty';
  $handler->display->display_options['arguments']['nid']['default_argument_type'] = 'fixed';
  $handler->display->display_options['arguments']['nid']['default_argument_skip_url'] = 0;
  $handler->display->display_options['arguments']['nid']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['nid']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['nid']['summary_options']['items_per_page'] = '25';
  $handler->display->display_options['arguments']['nid']['break_phrase'] = 0;
  $handler->display->display_options['arguments']['nid']['not'] = 0;
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'review' => 'review',
  );

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page_all_reviews');
  $handler->display->display_options['defaults']['exposed_form'] = FALSE;
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['exposed_form']['options']['autosubmit'] = 1;
  $handler->display->display_options['exposed_form']['options']['autosubmit_hide'] = 1;
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '5';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['pager']['options']['id'] = '0';
  $handler->display->display_options['pager']['options']['expose']['items_per_page'] = TRUE;
  $handler->display->display_options['pager']['options']['expose']['items_per_page_label'] = 'Reviews per page';
  $handler->display->display_options['pager']['options']['expose']['items_per_page_options_all'] = 1;
  $handler->display->display_options['defaults']['relationships'] = FALSE;
  $handler->display->display_options['defaults']['sorts'] = FALSE;
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  $handler->display->display_options['sorts']['created']['exposed'] = TRUE;
  $handler->display->display_options['sorts']['created']['expose']['label'] = 'Post date';
  /* Sort criterion: Rating */
  $handler->display->display_options['sorts']['field_r_rating_overall_value']['id'] = 'field_r_rating_overall_value';
  $handler->display->display_options['sorts']['field_r_rating_overall_value']['table'] = 'field_data_field_r_rating_overall';
  $handler->display->display_options['sorts']['field_r_rating_overall_value']['field'] = 'field_r_rating_overall_value';
  $handler->display->display_options['sorts']['field_r_rating_overall_value']['ui_name'] = 'Rating';
  $handler->display->display_options['sorts']['field_r_rating_overall_value']['order'] = 'DESC';
  $handler->display->display_options['sorts']['field_r_rating_overall_value']['exposed'] = TRUE;
  $handler->display->display_options['sorts']['field_r_rating_overall_value']['expose']['label'] = 'Rating';
  /* Sort criterion: Content: Provider Name (field_r_provider_name) */
  $handler->display->display_options['sorts']['field_r_provider_name_value']['id'] = 'field_r_provider_name_value';
  $handler->display->display_options['sorts']['field_r_provider_name_value']['table'] = 'field_data_field_r_provider_name';
  $handler->display->display_options['sorts']['field_r_provider_name_value']['field'] = 'field_r_provider_name_value';
  $handler->display->display_options['sorts']['field_r_provider_name_value']['exposed'] = TRUE;
  $handler->display->display_options['sorts']['field_r_provider_name_value']['expose']['label'] = 'Provider';
  $handler->display->display_options['defaults']['arguments'] = FALSE;
  $handler->display->display_options['defaults']['filters'] = FALSE;
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'review' => 'review',
  );
  /* Filter criterion: Content: Provider Name (field_r_provider_name) */
  $handler->display->display_options['filters']['field_r_provider_name_value']['id'] = 'field_r_provider_name_value';
  $handler->display->display_options['filters']['field_r_provider_name_value']['table'] = 'field_data_field_r_provider_name';
  $handler->display->display_options['filters']['field_r_provider_name_value']['field'] = 'field_r_provider_name_value';
  $handler->display->display_options['filters']['field_r_provider_name_value']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_r_provider_name_value']['expose']['operator_id'] = 'field_r_provider_name_value_op';
  $handler->display->display_options['filters']['field_r_provider_name_value']['expose']['label'] = 'Provider';
  $handler->display->display_options['filters']['field_r_provider_name_value']['expose']['operator'] = 'field_r_provider_name_value_op';
  $handler->display->display_options['filters']['field_r_provider_name_value']['expose']['identifier'] = 'provider';
  $handler->display->display_options['filters']['field_r_provider_name_value']['expose']['required'] = 0;
  $handler->display->display_options['filters']['field_r_provider_name_value']['expose']['remember'] = 1;
  $handler->display->display_options['filters']['field_r_provider_name_value']['expose']['multiple'] = FALSE;
  $handler->display->display_options['path'] = 'providers/reviews';

  /* Display: Block */
  $handler = $view->new_display('block', 'Block', 'block');
  $handler->display->display_options['defaults']['title'] = FALSE;
  $handler->display->display_options['title'] = 'Latest VoIP Provider Reviews';
  $handler->display->display_options['defaults']['use_more'] = FALSE;
  $handler->display->display_options['use_more'] = TRUE;
  $handler->display->display_options['use_more_always'] = TRUE;
  $handler->display->display_options['use_more_text'] = 'View All >>';
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'some';
  $handler->display->display_options['pager']['options']['items_per_page'] = '3';
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'fields';
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['relationships'] = FALSE;
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Provider Name */
  $handler->display->display_options['fields']['field_r_provider_name']['id'] = 'field_r_provider_name';
  $handler->display->display_options['fields']['field_r_provider_name']['table'] = 'field_data_field_r_provider_name';
  $handler->display->display_options['fields']['field_r_provider_name']['field'] = 'field_r_provider_name';
  $handler->display->display_options['fields']['field_r_provider_name']['label'] = '';
  $handler->display->display_options['fields']['field_r_provider_name']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_r_provider_name']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['field_r_provider_name']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['field_r_provider_name']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['field_r_provider_name']['alter']['external'] = 0;
  $handler->display->display_options['fields']['field_r_provider_name']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['field_r_provider_name']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['field_r_provider_name']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['field_r_provider_name']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['field_r_provider_name']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['field_r_provider_name']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['field_r_provider_name']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['field_r_provider_name']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['field_r_provider_name']['alter']['html'] = 0;
  $handler->display->display_options['fields']['field_r_provider_name']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_r_provider_name']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['field_r_provider_name']['hide_empty'] = 0;
  $handler->display->display_options['fields']['field_r_provider_name']['empty_zero'] = 0;
  $handler->display->display_options['fields']['field_r_provider_name']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['field_r_provider_name']['field_api_classes'] = 0;
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['alter_text'] = 1;
  $handler->display->display_options['fields']['title']['alter']['text'] = '[field_r_provider_name]: [title]';
  $handler->display->display_options['fields']['title']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['title']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['title']['alter']['external'] = 0;
  $handler->display->display_options['fields']['title']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['title']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['title']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = 0;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = 0;
  $handler->display->display_options['fields']['title']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['title']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['title']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['title']['alter']['html'] = 0;
  $handler->display->display_options['fields']['title']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['title']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['title']['hide_empty'] = 0;
  $handler->display->display_options['fields']['title']['empty_zero'] = 0;
  $handler->display->display_options['fields']['title']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['title']['link_to_node'] = 1;
  $handler->display->display_options['defaults']['arguments'] = FALSE;

  /* Display: Entity content */
  $handler = $view->new_display('entity_view', 'Entity content', 'entity_view_1');
  $handler->display->display_options['defaults']['use_ajax'] = FALSE;
  $handler->display->display_options['use_ajax'] = TRUE;
  $handler->display->display_options['defaults']['exposed_form'] = FALSE;
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['exposed_form']['options']['autosubmit'] = 1;
  $handler->display->display_options['exposed_form']['options']['autosubmit_hide'] = 1;
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '5';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['pager']['options']['id'] = '0';
  $handler->display->display_options['pager']['options']['expose']['items_per_page'] = TRUE;
  $handler->display->display_options['pager']['options']['expose']['items_per_page_label'] = 'Reviews Per Page';
  $handler->display->display_options['pager']['options']['expose']['items_per_page_options'] = '5, 10, 20, 40, 60,100';
  $handler->display->display_options['pager']['options']['expose']['items_per_page_options_all'] = 1;
  $handler->display->display_options['pager']['options']['expose']['items_per_page_options_all_label'] = 'View All';
  $handler->display->display_options['defaults']['relationships'] = FALSE;
  /* Relationship: Entity Reference: Referenced Entity */
  $handler->display->display_options['relationships']['field_ref_provider_target_id']['id'] = 'field_ref_provider_target_id';
  $handler->display->display_options['relationships']['field_ref_provider_target_id']['table'] = 'field_data_field_ref_provider';
  $handler->display->display_options['relationships']['field_ref_provider_target_id']['field'] = 'field_ref_provider_target_id';
  $handler->display->display_options['relationships']['field_ref_provider_target_id']['required'] = 1;
  $handler->display->display_options['defaults']['sorts'] = FALSE;
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  $handler->display->display_options['sorts']['created']['exposed'] = TRUE;
  $handler->display->display_options['sorts']['created']['expose']['label'] = 'Post date';
  /* Sort criterion: Content: Rating Overall (field_r_rating_overall) */
  $handler->display->display_options['sorts']['field_r_rating_overall_value']['id'] = 'field_r_rating_overall_value';
  $handler->display->display_options['sorts']['field_r_rating_overall_value']['table'] = 'field_data_field_r_rating_overall';
  $handler->display->display_options['sorts']['field_r_rating_overall_value']['field'] = 'field_r_rating_overall_value';
  $handler->display->display_options['sorts']['field_r_rating_overall_value']['exposed'] = TRUE;
  $handler->display->display_options['sorts']['field_r_rating_overall_value']['expose']['label'] = 'Rating';
  $handler->display->display_options['entity_type'] = 'node';
  $handler->display->display_options['bundles'] = array(
    0 => 'provider',
  );

  /* Display: Block - All Reviews */
  $handler = $view->new_display('block', 'Block - All Reviews', 'block_all_reviews');
  $handler->display->display_options['defaults']['use_ajax'] = FALSE;
  $handler->display->display_options['use_ajax'] = TRUE;
  $handler->display->display_options['defaults']['exposed_form'] = FALSE;
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['exposed_form']['options']['autosubmit'] = 1;
  $handler->display->display_options['exposed_form']['options']['autosubmit_hide'] = 1;
  $handler->display->display_options['defaults']['relationships'] = FALSE;
  $handler->display->display_options['defaults']['sorts'] = FALSE;
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  $handler->display->display_options['sorts']['created']['exposed'] = TRUE;
  $handler->display->display_options['sorts']['created']['expose']['label'] = 'Post date';
  /* Sort criterion: Content: Your VoIP Service Provider (field_ref_provider) */
  $handler->display->display_options['sorts']['field_ref_provider_target_id']['id'] = 'field_ref_provider_target_id';
  $handler->display->display_options['sorts']['field_ref_provider_target_id']['table'] = 'field_data_field_ref_provider';
  $handler->display->display_options['sorts']['field_ref_provider_target_id']['field'] = 'field_ref_provider_target_id';
  $handler->display->display_options['sorts']['field_ref_provider_target_id']['exposed'] = TRUE;
  $handler->display->display_options['sorts']['field_ref_provider_target_id']['expose']['label'] = 'Your VoIP Service Provider (field_ref_provider)';
  $handler->display->display_options['defaults']['arguments'] = FALSE;
  $handler->display->display_options['defaults']['filters'] = FALSE;
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'review' => 'review',
  );
  /* Filter criterion: Content: Your VoIP Service Provider (field_ref_provider) */
  $handler->display->display_options['filters']['field_ref_provider_target_id']['id'] = 'field_ref_provider_target_id';
  $handler->display->display_options['filters']['field_ref_provider_target_id']['table'] = 'field_data_field_ref_provider';
  $handler->display->display_options['filters']['field_ref_provider_target_id']['field'] = 'field_ref_provider_target_id';
  $handler->display->display_options['filters']['field_ref_provider_target_id']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_ref_provider_target_id']['expose']['operator_id'] = 'field_ref_provider_target_id_op';
  $handler->display->display_options['filters']['field_ref_provider_target_id']['expose']['label'] = 'Your VoIP Service Provider (field_ref_provider)';
  $handler->display->display_options['filters']['field_ref_provider_target_id']['expose']['operator'] = 'field_ref_provider_target_id_op';
  $handler->display->display_options['filters']['field_ref_provider_target_id']['expose']['identifier'] = 'provider_id';
  $handler->display->display_options['filters']['field_ref_provider_target_id']['expose']['multiple'] = FALSE;
  
  $views[$view->name] = $view;
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  /* Sitemap */
  /* ---------------------------------------------------------------- */
  
  $view = new view;
  $view->name = 'sitemap';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'Sitemap';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Sitemap';
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['query']['options']['query_comment'] = FALSE;
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '15';
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['row_plugin'] = 'fields';
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['title']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['title']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = 0;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = 0;
  $handler->display->display_options['fields']['title']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['title']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['title']['alter']['html'] = 0;
  $handler->display->display_options['fields']['title']['hide_empty'] = 0;
  $handler->display->display_options['fields']['title']['empty_zero'] = 0;
  $handler->display->display_options['fields']['title']['link_to_node'] = 1;
  /* Field: Content: Post date */
  $handler->display->display_options['fields']['created']['id'] = 'created';
  $handler->display->display_options['fields']['created']['table'] = 'node';
  $handler->display->display_options['fields']['created']['field'] = 'created';
  $handler->display->display_options['fields']['created']['label'] = '';
  $handler->display->display_options['fields']['created']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['created']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['created']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['created']['alter']['external'] = 0;
  $handler->display->display_options['fields']['created']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['created']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['created']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['created']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['created']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['created']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['created']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['created']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['created']['alter']['html'] = 0;
  $handler->display->display_options['fields']['created']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['created']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['created']['hide_empty'] = 0;
  $handler->display->display_options['fields']['created']['empty_zero'] = 0;
  $handler->display->display_options['fields']['created']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['created']['date_format'] = 'custom';
  $handler->display->display_options['fields']['created']['custom_date_format'] = 'd-m-Y';
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'article' => 'article',
    'blog_post' => 'blog_post',
    'news_post' => 'news_post',
    'provider' => 'provider',
    'review' => 'review',
  );

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page');
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'fields';
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['title']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['title']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = 0;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = 0;
  $handler->display->display_options['fields']['title']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['title']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['title']['alter']['html'] = 0;
  $handler->display->display_options['fields']['title']['hide_empty'] = 0;
  $handler->display->display_options['fields']['title']['empty_zero'] = 0;
  $handler->display->display_options['fields']['title']['link_to_node'] = 1;
  /* Field: Content: Post date */
  $handler->display->display_options['fields']['created']['id'] = 'created';
  $handler->display->display_options['fields']['created']['table'] = 'node';
  $handler->display->display_options['fields']['created']['field'] = 'created';
  $handler->display->display_options['fields']['created']['label'] = '';
  $handler->display->display_options['fields']['created']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['created']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['created']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['created']['alter']['external'] = 0;
  $handler->display->display_options['fields']['created']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['created']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['created']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['created']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['created']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['created']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['created']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['created']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['created']['alter']['html'] = 0;
  $handler->display->display_options['fields']['created']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['created']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['created']['hide_empty'] = 0;
  $handler->display->display_options['fields']['created']['empty_zero'] = 0;
  $handler->display->display_options['fields']['created']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['created']['date_format'] = 'medium';
  $handler->display->display_options['fields']['created']['custom_date_format'] = 'd-m-Y';
  /* Field: Content: Type */
  $handler->display->display_options['fields']['type']['id'] = 'type';
  $handler->display->display_options['fields']['type']['table'] = 'node';
  $handler->display->display_options['fields']['type']['field'] = 'type';
  $handler->display->display_options['fields']['type']['exclude'] = TRUE;
  $handler->display->display_options['fields']['type']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['type']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['type']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['type']['alter']['external'] = 0;
  $handler->display->display_options['fields']['type']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['type']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['type']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['type']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['type']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['type']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['type']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['type']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['type']['alter']['html'] = 0;
  $handler->display->display_options['fields']['type']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['type']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['type']['hide_empty'] = 0;
  $handler->display->display_options['fields']['type']['empty_zero'] = 0;
  $handler->display->display_options['fields']['type']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['type']['link_to_node'] = 0;
  $handler->display->display_options['fields']['type']['machine_name'] = 0;
  $handler->display->display_options['path'] = 'sitemap';

  /* Display: Feed */
  $handler = $view->new_display('feed', 'Feed', 'feed');
  $handler->display->display_options['pager']['type'] = 'none';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['style_plugin'] = 'rss';
  $handler->display->display_options['row_plugin'] = 'node_rss';
  $handler->display->display_options['row_options']['item_length'] = 'title';
  $handler->display->display_options['row_options']['links'] = 1;
  $handler->display->display_options['path'] = 'sitemap.xml';
  $handler->display->display_options['displays'] = array(
    'default' => 'default',
    'page' => 'page',
  );

  $views[$view->name] = $view;
  
  
  
  return $views;
}