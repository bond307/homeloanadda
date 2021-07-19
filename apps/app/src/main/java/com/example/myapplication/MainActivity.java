package com.example.myapplication;

import androidx.appcompat.app.AppCompatActivity;
import androidx.swiperefreshlayout.widget.SwipeRefreshLayout;

import android.app.ProgressDialog;
import android.graphics.Bitmap;
import android.os.Bundle;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;

public class MainActivity extends AppCompatActivity {

    WebView MywebView;



    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        MywebView = (WebView)findViewById(R.id.webViedId);
        MywebView.loadUrl("https://homeloanadda.com/apps.html");

        MywebView.setWebViewClient(new WebViewClient());

        WebSettings x = MywebView.getSettings();
        x.setJavaScriptEnabled(true);
        x.setSupportZoom(true);
        x.setBuiltInZoomControls(false);
        x.setCacheMode(WebSettings.LOAD_NO_CACHE);
        x.setDomStorageEnabled(true);
        x.setEnableSmoothTransition(true);
        x.setSaveFormData(true);
        x.setSavePassword(true);
        x.setDomStorageEnabled(true);
        x.setLayoutAlgorithm(WebSettings.LayoutAlgorithm.NARROW_COLUMNS);

    }

    @Override
    public void onBackPressed() {
        if(MywebView.canGoBack()){
            MywebView.goBack();
        }else{
            finish();
        }
    }
    


}