<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use App\Http\Requests\FormValidation;
use App\Imports\ProductsImport;
use App\Models\Categorys;
use App\Models\Products;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App;
use App\Models\MapOrders;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productList = Products::all();
        return view('admin.products.list-product', ['data' => $productList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create-product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required'],
            'describe' => ['required'],
            'price' => ['required'],
            // 'quantity' => ['required'],
            'code' => ['required'],
            'fileToUpload' => ['required'],
            'ary' => ['required'],
        ]);
    }

    public function store(FormValidation $request)
    {
        $param = $this->paramDelete;
        $userCurrent = $this->getStatusUserCurrent();
        $check = $this->checkRoleUser($param);
        if ($check == true && $userCurrent) {
            $idCategory = $this->isGetIdCategory($request->only('ary'));
            $image = $this->isHandImage($request->fileToUpload);
            $this->isCreatedProduct($request->all(), $image,  $idCategory);
            return redirect()->route('product');
        }
        return back()->with('err', 'Bạn không có quyền.');
    }

    public function isCreatedProduct($dataRequest, $image, $idCategory)
    {
        Products::create([
            'name' => $dataRequest['name'],
            'describe' => $dataRequest['describe'],
            'price' => $dataRequest['price'],
            'image' => $image[1],
            'code' => $dataRequest['code'],
            'category_id' => $idCategory['id'],
        ]);
    }

    public function isGetIdCategory($id)
    {
        foreach ($id as $item) {
            $id = Categorys::firstOrCreate([
                'name' => $item
            ]);
        };
        return $id;
    }

    // public function isHandImage($isFileImage)
    // {
    //     if ($isFileImage) {
    //         $imageName = time()  . '_' . rand(5, 2222) . '_' . $isFileImage->getClientOriginalExtension();
    //         $image =  $isFileImage->move(public_path('images'), $imageName);
    //         $path = $image->getRealPath();
    //         $exp = explode('public', $path);
    //         return $exp;
    //     }
    // }

    public function export()
    {
        return Excel::download(new ProductExport, 'product.xlsx');
    }


    public function print_pdf()
    {
        $pdf = App::make('dompdf.wrapper');
        $data = Products::get();
        $pdf->loadView('pdf.pdf', ['data' => $data]);
        return $pdf->stream();
    }

    public function searchProduct(Request $request)
    {
        $search = \request('keyword', '');
        // dump( $search);
        return ($search == '') ? $this->getResultNull() :  $this->getResult($search);
    }

    public function getResult($search)
    {
        $employees = Products::orderby('name', 'asc')
            ->select('id', 'describe', 'image', 'price', 'code', 'name')
            ->where('name', 'like', '%' . $search . '%')->limit(10)->get();

        $response = array();

        foreach ($employees as $employee) {
            $response[] = array(
                "id" => $employee->id,
                "name" => $employee->name,
                "image" => $employee->image,
                "price" => $employee->price,
                "code" => $employee->code,
                // "quantity" => $employee->quantity,
                'describe' => $employee->describe
            );
        }
        return response()->json($response);
    }

    public function getResultNull()
    {
        $employees = Products::orderby('name', 'asc')
            ->select('id', 'name')
            ->limit(10)->get();
        return response()->json($employees);
    }

    /**
     * 
     * 
     * getClientOriginalName()://Lấy Tên files
     * getClientOriginalExtension()://   //Lấy Đuôi File
     * getRealPath() //  //Lấy đường dẫn tạm thời của file
     * getSize()////Lấy kích cỡ của file đơn vị tính theo bytes
     * getMimeType()// lay kieu file
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $param = $this->paramEdit;
        $userCurrent = $this->getStatusUserCurrent();
        $check = $this->checkRoleUser($param);
        if ($check == true && $userCurrent) {
            $dataCurrent = Products::find($id);
            return view('admin.products.edit-product', ['data' => $dataCurrent]);
        }
        return back()->with('err', 'Bạn không có quyền.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $data = Products::find($id);
        $imageNew = $this->isHandImage($request->fileToUpload);
        if ($imageNew == null) {
            $image = $data->image;
            $data->image = $image;
        } else {
            $data->image = $imageNew[1];
        }
        $data->name = $request->name;
        $data->describe = $request->describe;
        $data->price = $request->price;
        $data->code = $request->code;
        $data->save();
        // toastr.success( 'Xoá Thành Công');
        return redirect()->route('product');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $param = $this->paramDelete;
        $userCurrent = $this->getStatusUserCurrent();
        $check = $this->checkRoleUser($param);
        if ($check == true && $userCurrent) {
            $id = \request('id', 0);
            MapOrders::where('produc_id', $id)->delete();
            Products::find($id)->delete();
            return response()->json([
                'sus' => 'xoá thành công!'
            ]);
        } else {
            return response()->json([
                'err' => 'Bạn không có quyền xoá!'
            ]);
        }
    }
}
