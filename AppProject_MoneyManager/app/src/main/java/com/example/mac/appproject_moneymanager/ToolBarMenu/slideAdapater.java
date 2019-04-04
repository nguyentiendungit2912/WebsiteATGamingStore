package com.example.mac.appproject_moneymanager.ToolBarMenu;

import android.content.Context;
import android.support.annotation.NonNull;
import android.support.v4.view.PagerAdapter;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;

import com.example.mac.appproject_moneymanager.R;

class slideAdapater extends PagerAdapter {

    Context context;
    LayoutInflater layoutInflater;

    public slideAdapater(Context context){
        this.context = context;
    }

    //Arrays
    public int[] slide_images = {
            R.drawable.intro_icon,
            R.drawable.reading_icon,
            R.drawable.learning_icon,
            R.drawable.eatting_icon,
            R.drawable.learning_icon,
            R.drawable.reading_icon,
            R.drawable.intro_icon
    };

    public String[] slide_headings = {
            "Kính chào quý khách",
            "Bước 1:",
            "Bước 2:",
            "Bước 3:",
            "Bước 4:",
            "Bước 5:",
            "Cảm ơn các bạn đã tin tưởng và lựa chọn sử dụng dịch vụ của chúng tôi"
    };
    public String[] slide_descs = {
            "Các bước hướng dẫn sử dụng app.",
            "Chọn menu để thực hiện các thao tác như xem các khoản thu, chi và xu hướng chi tiêu",
            "Nhấn nút + hình tròn góc dưới bên phải màn hình để thêm các hoạt động chi tiêu",
            "Nhấn vào các hoạt động để chỉnh sửa nếu muốn",
            "Nhấn giữ vào hoạt động để xóa nếu muốn",
            "Nếu gặp phần mềm xảy ra sự cố hãy liên hệ với chúng tôi",
            "Xin chân thành cảm ơn!"
    };
    @Override
    public int getCount() {
        return slide_headings.length;
    }

    @Override
    public boolean isViewFromObject(@NonNull View view, @NonNull Object object) {
        return view == (LinearLayout) object;
    }

    @NonNull
    @Override
    public Object instantiateItem(@NonNull ViewGroup container, int position) {

        layoutInflater = (LayoutInflater) context.getSystemService(context.LAYOUT_INFLATER_SERVICE);
        View view = layoutInflater.inflate(R.layout.slide_adapter, container, false);

        ImageView slideImageView = (ImageView) view.findViewById(R.id.image);
        TextView slideHeading = (TextView) view.findViewById(R.id.heading);
        TextView slideDescription = (TextView) view.findViewById(R.id.description);

        slideImageView.setImageResource(slide_images[position]);
        slideHeading.setText(slide_headings[position]);
        slideDescription.setText(slide_descs[position]);
        container.addView(view);
        return view;
    }

    @Override
    public void destroyItem(@NonNull ViewGroup container, int position, @NonNull Object object) {

        container.removeView((LinearLayout)object);
    }
}
